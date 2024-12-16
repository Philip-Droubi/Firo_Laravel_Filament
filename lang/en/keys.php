<?php

use App\Enums\CustomerServiceCardStatus;
use App\Enums\CustomerServiceTypes;

return [

    /*
    |--------------------------------------------------------------------------
    | App Keys Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for various keys in the system
    | that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    //Public
    'yes' => 'Yes',
    'no' => 'No',
    'draft' => 'draft',
    'item' => 'Item',
    'items' => 'Items',
    'logs' => 'Logs',
    'text' => 'Text',
    'lang' => 'Lang',
    'name' => 'Name',
    'author' => 'Auther',
    'name_en' => 'English Name',
    'name_ar' => 'Arabic Name',
    'description' => 'Description',
    'type' => 'Type',
    'link' => 'Link',
    'title' => 'Title',
    'device_name' => 'Device name',
    'ip_address' => 'IP address',
    'main_image' => 'Main image',
    'question' => 'Question',
    'answer' => 'Answer',
    'visible' => 'Visible',
    'invisible' => 'Invisible',
    'visibility' => 'Visibility',
    'active' => 'Active',
    'status' => 'Status',
    'image' => 'Image',
    'all' => 'All',
    'inactive' => 'Inactive',
    'published' => 'Published',
    'published_at' => 'Published at',
    'deactive_at' => 'Deactivated at',
    'created_by' => 'Created By',
    'updated_by' => 'Updated By',
    'last_updated_by' => 'Updated By',
    'created_at' => 'Created at',
    'updated_at' => 'Updated at',

    //Navigation Groups
    'system info' => 'System Info',
    'system management' => 'System Management',
    'system users' => 'System Users',
    'system services' => 'System Services',

    //Country & State
    'country' => 'Country',
    'countries' => 'Countries',
    'state' => 'State',
    'states' => 'States',
    'city' => 'City',
    'country code' => 'Country code',
    'dial code' => 'Dial code',

    //Contact Us
    'contact us' => 'Contact Us',
    'contact' => 'Contact',
    'contacts' => 'Contacts',

    //About us
    'about us' => 'About Us',

    //TOS
    'term' => 'Term',
    'term of services' => 'Terms of services',

    //Privacy Policies
    'privacy policies' => 'Privacy Policies',

    //FAQ
    'faq' => 'FAQ',

    //Main Reports
    'main reports' => 'Main reports',
    'report' => 'Report',
    'reports' => 'Reports',

    //Defined Skills
    'skills' => 'Skills',
    'skill' => 'Skill',

    //Categories & Sub-Categories
    'categories' => 'Categories',
    'category' => 'Category',
    'sub categories' => 'Sub categories',
    'sub category' => 'sub categories',

    //App Features
    'feature' => 'Feature',
    'app features' => 'App features',

    //Articles
    'articles' => 'Articles',
    'article' => 'article',
    'Article Creation Info' => 'Article Creation Info',

    //Roles
    'role' => 'Role',
    'roles' => 'Roles',
    'abilities' => 'Abilities',

    //Users
    'users' => 'Users',
    'user' => 'User',
    'admin' => 'Admin',
    'admins' => 'Admins',
    'about user' => 'About user',
    'account name' => 'Account name',
    'email' => 'Email',
    'phone number' => 'Phone number',
    'last seen' => 'Last seen',
    'first name' => 'First name',
    'mid name' => 'Middle name',
    'last name' => 'Last name',
    'birth date' => 'Birth date',
    'password' => 'Password',
    'password confirmation' => 'Password confirmation',
    'User Account Info' => 'User Account Info',
    'User personal info' => 'User personal info',
    'User Creation Info' => 'User Creation Info',
    'Account Status' => 'Account Status',
    'Account is active' => 'Account is active',
    'bg_image' => 'Background image',
    'freelancer' => 'Freelancer',
    'stakeholder' => 'Stakeholder',
    'tfa' => 'Two Factor Authentication',
    'logout all' => 'Log out all devices',

    //Login History
    'login history page title' => 'Login history for :user_name',
    'login history' => 'Login history',

    //Auth
    'Email / Username' => 'Email / Username',

    //Ban System
    'ban log' => 'Ban log',
    'reason' => 'Reason',
    'auto ban' => 'Auto ban',
    'banned_until' => 'Banned until',
    'ban user' => 'Ban user',
    'unban user' => 'Unban user',
    'ban' => 'Ban',
    'banned_user' => 'Banned user',

    //User Points
    'points' => 'Points',
    'user_points' => 'User points',
    'case' => 'Case',

    //User Reports
    "reporter name" => 'Reporter name',
    "reported name" => 'Reported name',
    "report case" => 'Report type',
    "report on" => 'Report on',
    "reports on" => 'Reports on',
    "report type" => 'Report type',
    'reports count' => 'Reports count',

    //User Service
    'users services' => 'Users services',
    'user service' => 'User service',
    'user services' => 'User service',

    //DashBoard
    'this week' => 'This Week',
    'this month' => 'This Month',
    'all time' => 'All Time',
    'new users' => 'New Users',
    'active admins' => 'Active admins',

    //Customer card
    CustomerServiceCardStatus::PENDING->value => 'Pending',
    CustomerServiceCardStatus::OPEN->value => 'Open',
    CustomerServiceCardStatus::CLOSED->value => 'Closed',
    CustomerServiceTypes::INQUIRY->value => 'Inquiry',
    CustomerServiceTypes::BUG->value  => 'Technical problem',
    'customer cards' => 'Customer cards',
    'customers cards' => 'Customers cards',
    'customer card' => 'Customer card',
];
