<?php

namespace App\Filament\Resources\Administration\Article;

use App\Filament\Resources\Administration\Article\ArticleResource\Pages;
use App\Filament\Resources\Users\AdminResource;
use App\Models\Administration\App\Category;
use App\Models\Administration\App\DefinedSkill;
use App\Models\Administration\Article\Article;
use App\Traits\StorageHelper;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Get;
use Filament\Support\Enums\FontWeight;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Colors\Color;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use App\Traits\PublicStyles;
use Filament\Forms\Components\Placeholder;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class ArticleResource extends BaseResource
{
    use StorageHelper, PublicStyles;

    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 6;

    protected static ?string $slug = 'articles';

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return $record->title;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return ArticleResource::getUrl('view', ['record' => $record]);
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            __('keys.author') => $record->user->name,
            __('keys.category') => $record->category->name,
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['user', 'category']);
    }

    public static function form(Form $form): Form
    {
        $skillsData = array_values(DefinedSkill::all()->pluck('name')->toArray());
        $skillsOptions = array_combine($skillsData, $skillsData);

        return $form
            ->schema([
                //Key To help in generating Random key for article (Help in processing article Images)
                Forms\Components\Hidden::make('random')
                    ->label("random")
                    ->default(Str::random(30)),
                //Creation Info Section (Only on view)
                Section::make(__("keys.Article Creation Info"))
                    ->schema([
                        Placeholder::make("user.name")
                            ->label(__("keys.created_by"))
                            ->translateLabel()
                            ->content(function ($record) {
                                return new HtmlString('<a href="' . AdminResource::getUrl('view', [$record->user_id]) . '">' . $record->user->name . '</a>');
                            })->extraAttributes(['style' => (new class {
                                use PublicStyles;
                            })->getInfolistFieldStyle()]),
                        Forms\Components\DateTimePicker::make("created_at")
                            ->label(__("keys.created_at"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("updated_at")
                            ->label(__(key: "keys.updated_at"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("published_at")
                            ->label(__(key: "keys.published_at"))
                            ->translateLabel(),
                    ])
                    ->visibleOn("view")
                    ->columns(3),
                //Draft Section
                Section::make()->schema([
                    Forms\Components\Toggle::make('is_draft')
                        ->required()
                        ->label(__("keys.draft"))
                        ->translateLabel()
                        ->columnSpanFull(),
                ]),
                //Article Input
                //Title
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label(__(key: "keys.title"))
                    ->translateLabel(),
                //Category
                Forms\Components\Select::make('category_id')
                    ->required()
                    ->relationship(name: 'category', titleAttribute: 'name')
                    ->searchable(['name'])
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                    ->label(__("keys.category"))
                    ->translateLabel(),
                //Main Image
                FileUpload::make('main_img_url')
                    ->image()
                    ->maxSize(2048)
                    ->directory('articles')
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/gif', 'image/jpeg'])
                    ->imageEditor()
                    ->moveFiles()
                    ->imageEditorEmptyFillColor('#333')
                    ->columnSpanFull()
                    ->resize(50)
                    ->label(__("keys.main_image"))
                    ->translateLabel(),
                //Skills
                Forms\Components\Select::make('skills')
                    ->required()
                    ->multiple()
                    ->maxItems(255)
                    ->options($skillsOptions)
                    ->searchable()
                    ->preload()
                    ->optionsLimit(80)
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->unique('defined_skills', 'name', ignoreRecord: true)
                            ->maxLength(255)
                            ->label(__("keys.name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make('description')
                            ->maxLength(length: 500)
                            ->default(null)
                            ->label(__("keys.description"))
                            ->translateLabel(),
                    ])
                    ->createOptionUsing(function (array $data): string {
                        $skill = DefinedSkill::create([
                            "name" => $data["name"],
                            "description" => $data["description"],
                        ]);
                        return $skill["name"];
                    })
                    ->label(__("keys.skills"))
                    ->translateLabel(),
                //Body
                TiptapEditor::make('body')
                    ->profile('article')
                    ->label(__(key: "keys.text"))
                    ->directory(function (Get $get) {
                        return "/temp/articles/" . $get("random");
                    })
                    ->translateLabel()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 12rem;'])
                    ->disableFloatingMenus()
                    ->required(),
                //Draft (Again)
                Section::make()->schema([
                    Forms\Components\Toggle::make('is_draft')
                        ->required()
                        ->label(__("keys.draft"))
                        ->translateLabel()
                        ->columnSpanFull()
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Grid::make()
                    ->columns(1)
                    ->schema([
                        Tables\Columns\Layout\Split::make([
                            Tables\Columns\Layout\Grid::make()
                                ->columns(1)
                                ->schema([
                                    Tables\Columns\ImageColumn::make("main_img_url")
                                        ->width(100)
                                        ->height(160)
                                        ->defaultImageUrl(url('/assets/defaults/no-image.jpg'))
                                        ->extraAttributes(["style" => "border:1px solid gray;border-radius:8px; overflow:hidden"]),
                                ])->grow(false),
                            Tables\Columns\Layout\Stack::make([
                                //Title
                                TextColumn::make('title')
                                    ->sortable()
                                    ->searchable()
                                    ->label(__("keys.title"))
                                    ->translateLabel()
                                    ->weight(FontWeight::Bold)
                                    ->limit(50)
                                    ->tooltip(function (TextColumn $column): ?string {
                                        $state = $column->getState();
                                        return strlen($state) <= $column->getCharacterLimit() ?
                                            null : $state;
                                    }),
                                //Category
                                Tables\Columns\TextColumn::make('category.name')
                                    ->color("gray")
                                    ->weight(FontWeight::Medium)
                                    ->icon("heroicon-o-tag")
                                    ->searchable(),
                                //Created_at
                                self::getDateTableComponent(dateTime: 'Y/m/d h:i a')
                                    ->icon('heroicon-o-clock')
                                    ->extraAttributes(["style" => 'margin-top:10px']),
                                //Draft
                                Tables\Columns\TextColumn::make('is_draft')
                                    ->prefix(__("keys.status") . ": ")
                                    ->getStateUsing(function ($record) {
                                        if (!$record->is_draft)
                                            return __("keys.published");
                                        return __("keys.draft");
                                    })
                                    ->color(function ($record) {
                                        if (!$record->is_draft)
                                            return __("success");
                                        return __("warning");
                                    })
                                    ->extraAttributes(["style" => "margin-top:10px"])
                                    ->badge(),
                                //Skills
                                BadgeableColumn::make("skills.skill")
                                    ->badge()
                                    ->extraAttributes(["style" => 'margin-top:10px'])
                                    ->color(Color::Teal),
                            ]),
                        ])
                    ])
            ])->contentGrid([
                'md' => 2,
                '2xl' => 3
            ])
            ->defaultSort("created_at", "desc")
            ->filters([
                Filter::make('is_draft')
                    ->toggle()
                    ->query(fn(Builder $query): Builder => $query->where('is_draft', true))
                    ->label(__("keys.draft"))
                    ->translateLabel(),
                SelectFilter::make('category_id')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                    ->indicateUsing(function (array $data): array {
                        return Category::query()->whereIn('id', $data['values'])->get()->pluck('name')->toArray();
                    })
                    ->label(__("keys.category"))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->extraAttributes(["style" => (new class {
                        use PublicStyles;
                    })->getEditAsPileButton()]),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Article $record) {
                        if ($record->main_img_url && Storage::disk('public')->exists($record->main_img_url)) {
                            Storage::disk("public")->delete($record->main_img_url);
                        }
                        Storage::disk('public')->deleteDirectory("articles/" . $record->id);
                    })
                    ->extraAttributes(["style" => (new class {
                        use PublicStyles;
                    })->getDeleteAsPileButton()]),
            ])
            ->paginationPageOptions([9, 18, 27])
            ->recordUrl(
                fn(Article $record): string => Pages\ViewArticle::getUrl([$record->id]),
            )
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function (Collection $records) {
                            foreach ($records as $record) {
                                if ($record->main_img_url && Storage::disk('public')->exists($record->main_img_url)) {
                                    Storage::disk("public")->delete($record->main_img_url);
                                }
                                Storage::disk('public')->deleteDirectory("articles/" . $record->id);
                            }
                        })
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'view' => Pages\ViewArticle::route('/{record}'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.articles');
    }

    public static function getModelLabel(): string
    {
        return __('keys.article');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.articles');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system info');
    }
}
