<?php

return [
    'userManagement' => [
        'title'          => 'Benutzerverwaltung',
        'title_singular' => 'Benutzerverwaltung',
    ],
    'permission' => [
        'title'          => 'Zugriffsrechte',
        'title_singular' => 'Berechtigung',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rollen',
        'title_singular' => 'Rolle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Benutzer',
        'title_singular' => 'Benutzer',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'team'                     => 'Team',
            'team_helper'              => ' ',
            'greeting'                 => 'Greeting',
            'greeting_helper'          => ' ',
            'notifications'            => 'Notifications',
            'notifications_helper'     => ' ',
            'lang'                     => 'Lang',
            'lang_helper'              => ' ',
        ],
    ],
    'property' => [
        'title'          => 'Properties',
        'title_singular' => 'Property',
    ],
    'postProperty' => [
        'title'          => 'Post Properties',
        'title_singular' => 'Post Property',
    ],
    'stat' => [
        'title'          => 'Stat',
        'title_singular' => 'Stat',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'stat_sk'           => 'Stat SK',
            'stat_sk_helper'    => ' ',
            'stat_de'           => 'Stat DE',
            'stat_de_helper'    => ' ',
        ],
    ],
    'sender' => [
        'title'          => 'Sender',
        'title_singular' => 'Sender',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'sender'            => 'Sender SK',
            'sender_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'sender_de'         => 'Sender DE',
            'sender_de_helper'  => ' ',
            'sender_en'         => 'Sender EN',
            'sender_en_helper'  => ' ',
        ],
    ],
    'status' => [
        'title'          => 'Status',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'status_icon'        => 'Status Icon',
            'status_icon_helper' => ' ',
            'title_de'           => 'Title De',
            'title_de_helper'    => ' ',
            'title_sk'           => 'Title Sk',
            'title_sk_helper'    => ' ',
            'title_en'           => 'Title En',
            'title_en_helper'    => ' ',
        ],
    ],
    'postform' => [
        'title'          => 'Postform',
        'title_singular' => 'Postform',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'postform_sk'          => 'Postform SK',
            'postform_sk_helper'   => ' ',
            'postform_icon'        => 'Postform Icon',
            'postform_icon_helper' => ' ',
            'title_de'             => 'Title De',
            'title_de_helper'      => ' ',
            'title_sk'             => 'Title Sk',
            'title_sk_helper'      => ' ',
            'title_en'             => 'Title En',
            'title_en_helper'      => ' ',
        ],
    ],
    'query' => [
        'title'          => 'Query',
        'title_singular' => 'Query',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'customer_query'        => 'Customer Query',
            'customer_query_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'long_text'             => 'Long Text',
            'long_text_helper'      => ' ',
        ],
    ],
    'input' => [
        'title'          => 'Input',
        'title_singular' => 'Input',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'zadal'             => 'Zadal',
            'zadal_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'processed' => [
        'title'          => 'Processed',
        'title_singular' => 'Processed',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'processed'           => 'Processed',
            'processed_helper'    => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'processed_de'        => 'Processed DE',
            'processed_de_helper' => ' ',
            'processed_en'        => 'Processed EN',
            'processed_en_helper' => ' ',
        ],
    ],
    'firmaProperty' => [
        'title'          => 'Firma Properties',
        'title_singular' => 'Firma Property',
    ],
    'spracovany' => [
        'title'          => 'Spracovanie',
        'title_singular' => 'Spracovanie',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'popis'             => 'Popis',
            'popis_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'popis_de'          => 'Popis DE',
            'popis_de_helper'   => ' ',
            'popis_en'          => 'Popis EN',
            'popis_en_helper'   => ' ',
        ],
    ],
    'ucto' => [
        'title'          => 'Ucto',
        'title_singular' => 'Ucto',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'uctuje'            => 'Uctuje',
            'uctuje_helper'     => ' ',
            'tel'               => 'Tel',
            'tel_helper'        => ' ',
            'mobil'             => 'Mobil',
            'mobil_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'poznamka'          => 'Poznamka',
            'poznamka_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'eSchranka' => [
        'title'          => 'eSchranka',
        'title_singular' => 'eSchranka',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'splnomocnenec'        => 'Splnomocnenec',
            'splnomocnenec_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'invoiceProperty' => [
        'title'          => 'Invoice Properties',
        'title_singular' => 'Invoice Property',
    ],
    'nasa' => [
        'title'          => 'Nasa',
        'title_singular' => 'Nasa',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'konto'             => 'Konto',
            'konto_helper'      => ' ',
            'iban'              => 'IBAN',
            'iban_helper'       => ' ',
            'swift'             => 'SWIFT',
            'swift_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'firma' => [
        'title'          => 'Firma',
        'title_singular' => 'Firma',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'ico'                  => 'ICO',
            'ico_helper'           => ' ',
            'dic'                  => 'DIC',
            'dic_helper'           => ' ',
            'ic_dph'               => 'IC Dph',
            'ic_dph_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'nazov'                => 'Nazov',
            'nazov_helper'         => ' ',
            'spracovanie'          => 'Spracovanie',
            'spracovanie_helper'   => ' ',
            'ucto'                 => 'Ucto',
            'ucto_helper'          => ' ',
            'e_schranka'           => 'e Schranka',
            'e_schranka_helper'    => ' ',
            'iban'                 => 'IBAN',
            'iban_helper'          => ' ',
            'swift_bic'            => 'SWIFT_BIC',
            'swift_bic_helper'     => ' ',
            'popis'                => 'Popis',
            'popis_helper'         => ' ',
            'telefon'              => 'Telefon',
            'telefon_helper'       => ' ',
            'address'              => 'Address',
            'address_helper'       => ' ',
            'nasa'                 => 'Nasa',
            'nasa_helper'          => ' ',
            'idmmc'                => 'Idmmc',
            'idmmc_helper'         => ' ',
            'activ'                => 'Activ',
            'activ_helper'         => ' ',
            'team'                 => 'Team',
            'team_helper'          => ' ',
            'short_address'        => 'Short Address',
            'short_address_helper' => ' ',
            'ic_dph_form'          => 'IC DPH Form',
            'ic_dph_form_helper'   => ' ',
            'sprac_posty'          => 'Sprac Posty',
            'sprac_posty_helper'   => ' ',
            'kontakt'              => 'Kontakt',
            'kontakt_helper'       => ' ',
            'orsr'                 => 'Orsr',
            'orsr_helper'          => ' ',
            'zrsr'                 => 'Zrsr',
            'zrsr_helper'          => ' ',
            'bank'                 => 'Bank',
            'bank_helper'          => ' ',
            'id_pohoda'            => 'ID Pohoda',
            'id_pohoda_helper'     => ' ',
        ],
    ],
    'post' => [
        'title'          => 'Post',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'date'                   => 'Date',
            'date_helper'            => ' ',
            'sender'                 => 'Sender',
            'sender_helper'          => ' ',
            'scan'                   => 'Scan',
            'scan_helper'            => ' ',
            'accounting'             => 'Accounting',
            'accounting_helper'      => ' ',
            'status'                 => 'Status',
            'status_helper'          => ' ',
            'status_date'            => 'Status Date',
            'status_date_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'customer_query'         => 'Customer Query',
            'customer_query_helper'  => ' ',
            'customer_notice'        => 'Customer Notice',
            'customer_notice_helper' => ' ',
            'send_email'             => 'Send Email',
            'send_email_helper'      => ' ',
            'post_nr'                => 'Post Nr',
            'post_nr_helper'         => ' ',
            'zadal'                  => 'Zadal',
            'zadal_helper'           => ' ',
            'iban'                   => 'IBAN',
            'iban_helper'            => ' ',
            'swift'                  => 'Swift/BIC',
            'swift_helper'           => ' ',
            'vs'                     => 'VS',
            'vs_helper'              => ' ',
            'ss'                     => 'SS',
            'ss_helper'              => ' ',
            'ks'                     => 'KS',
            'ks_helper'              => ' ',
            'payment_info'           => 'Payment info',
            'payment_info_helper'    => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'paid'                   => 'Paid',
            'paid_helper'            => ' ',
            'for_recipient'          => 'For Recipient',
            'for_recipient_helper'   => ' ',
            'processed'              => 'Processed',
            'processed_helper'       => ' ',
            'processed_at'           => 'Processed at',
            'processed_at_helper'    => ' ',
            'post_form'              => 'Post Form',
            'post_form_helper'       => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
            'dok_typ'                => 'Dok Typ',
            'dok_typ_helper'         => ' ',
            'title'                  => 'Title',
            'title_helper'           => ' ',
            'notice'                 => 'Notice',
            'notice_helper'          => ' ',
            'envelope'               => 'Envelope',
            'envelope_helper'        => ' ',
            'due_date'               => 'Due Date',
            'due_date_helper'        => ' ',
            'file_short_text'        => 'File Short Text',
            'file_short_text_helper' => ' ',
        ],
    ],
    'notice' => [
        'title'          => 'Notices',
        'title_singular' => 'Notice',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'notice'            => 'Notice',
            'notice_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'callProperty' => [
        'title'          => 'Call Properties',
        'title_singular' => 'Call Property',
    ],
    'callTyp' => [
        'title'          => 'Call Typ',
        'title_singular' => 'Call Typ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'call_typ'          => 'Call Typ',
            'call_typ_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'call' => [
        'title'          => 'Calls',
        'title_singular' => 'Call',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'date_time'           => 'Date Time',
            'date_time_helper'    => ' ',
            'company'             => 'Company',
            'company_helper'      => ' ',
            'notice'              => 'Notice',
            'notice_helper'       => ' ',
            'zadal'               => 'Zadal',
            'zadal_helper'        => ' ',
            'call_nr'             => 'Call Nr',
            'call_nr_helper'      => ' ',
            'short_notice'        => 'Short notice',
            'short_notice_helper' => ' ',
            'call_typ'            => 'Call Typ',
            'call_typ_helper'     => ' ',
            'duration'            => 'Duration',
            'duration_helper'     => ' ',
            'team'                => 'Team',
            'team_helper'         => ' ',
            'send_email'          => 'Send Email',
            'send_email_helper'   => ' ',
        ],
    ],
    'invoiceTyp' => [
        'title'          => 'Invoice Typ',
        'title_singular' => 'Invoice Typ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'shortcut'          => 'Shortcut',
            'shortcut_helper'   => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'invoice' => [
        'title'          => 'Invoices',
        'title_singular' => 'Invoice',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'number'                 => 'Number',
            'number_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'date'                   => 'Date',
            'date_helper'            => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'pay_date'               => 'Pay Date',
            'pay_date_helper'        => ' ',
            'file'                   => 'File',
            'file_helper'            => ' ',
            'payment_term'           => 'Payment',
            'payment_term_helper'    => ' ',
            'nasa'                   => 'Nasa',
            'nasa_helper'            => ' ',
            'visible'                => 'Visible',
            'visible_helper'         => ' ',
            'typ'                    => 'Typ',
            'typ_helper'             => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
            'send_email'             => 'Send Email',
            'send_email_helper'      => ' ',
            'accounting_date'        => 'Accounting Date',
            'accounting_date_helper' => ' ',
        ],
    ],
    'carProperty' => [
        'title'          => 'Car Properties',
        'title_singular' => 'Car Property',
    ],
    'insurance' => [
        'title'          => 'Insurance',
        'title_singular' => 'Insurance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nazov'             => 'Nazov',
            'nazov_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'car' => [
        'title'          => 'Cars',
        'title_singular' => 'Car',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'ecv'                    => 'ECV',
            'ecv_helper'             => ' ',
            'vin'                    => 'VIN',
            'vin_helper'             => ' ',
            'sk_register'            => 'SK Register',
            'sk_register_helper'     => ' ',
            'stk_date'               => 'STK date',
            'stk_date_helper'        => ' ',
            'pzp_date'               => 'PZP Date',
            'pzp_date_helper'        => ' ',
            'pzp_documents'          => 'PZP Documents',
            'pzp_documents_helper'   => ' ',
            'kasko_date'             => 'Kasko Date',
            'kasko_date_helper'      => ' ',
            'kasko_dokuments'        => 'Kasko Dokuments',
            'kasko_dokuments_helper' => ' ',
            'poist_notice'           => 'Poist Notice',
            'poist_notice_helper'    => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'pzp_poistovna'          => 'PZP poistovna',
            'pzp_poistovna_helper'   => ' ',
            'kasko_poistovna'        => 'Kasko poistovna',
            'kasko_poistovna_helper' => ' ',
            'pzp_cislo'              => 'PZP cislo',
            'pzp_cislo_helper'       => ' ',
            'kasko_cislo'            => 'Kasko cislo',
            'kasko_cislo_helper'     => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
            'model'                  => 'Model',
            'model_helper'           => ' ',
            'typ'                    => 'Typ',
            'typ_helper'             => ' ',
            'znacka'                 => 'Znacka',
            'znacka_helper'          => ' ',
        ],
    ],
    'recipient' => [
        'title'          => 'Recipient',
        'title_singular' => 'Recipient',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'street_nr'         => 'Street Nr',
            'street_nr_helper'  => ' ',
            'psc'               => 'PSC',
            'psc_helper'        => ' ',
            'mesto_sk'          => 'Mesto SK',
            'mesto_sk_helper'   => ' ',
            'mesto_de'          => 'Mesto DE',
            'mesto_de_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'stat'              => 'Stat',
            'stat_helper'       => ' ',
        ],
    ],
    'outgoingPost' => [
        'title'          => 'Outgoing Post',
        'title_singular' => 'Outgoing Post',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'date'                => 'Date',
            'date_helper'         => ' ',
            'recipient'           => 'Recipient',
            'recipient_helper'    => ' ',
            'cost'                => 'Cost',
            'cost_helper'         => ' ',
            'notify'              => 'Notify',
            'notify_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'team'                => 'Team',
            'team_helper'         => ' ',
            'out_envelope'        => 'Out Envelope',
            'out_envelope_helper' => ' ',
            'out_scan'            => 'Out Scan',
            'out_scan_helper'     => ' ',
        ],
    ],
    'docProperty' => [
        'title'          => 'Doc Properties',
        'title_singular' => 'Doc Property',
    ],
    'document' => [
        'title'          => 'Documents',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'date'                   => 'Date',
            'date_helper'            => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'payment_info'           => 'Payment info',
            'payment_info_helper'    => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'iban'                   => 'IBAN',
            'iban_helper'            => ' ',
            'swift'                  => 'Swift/BIC',
            'swift_helper'           => ' ',
            'vs'                     => 'VS',
            'vs_helper'              => ' ',
            'ss'                     => 'SS',
            'ss_helper'              => ' ',
            'ks'                     => 'KS',
            'ks_helper'              => ' ',
            'paid'                   => 'Paid',
            'paid_helper'            => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
            'dok_typ'                => 'Dok Typ',
            'dok_typ_helper'         => ' ',
            'title'                  => 'Title',
            'title_helper'           => ' ',
            'notice'                 => 'Notice',
            'notice_helper'          => ' ',
            'dok_kat'                => 'Dok Kat',
            'dok_kat_helper'         => ' ',
            'document'               => 'Document',
            'document_helper'        => ' ',
            'document_code'          => 'Document Code',
            'document_code_helper'   => ' ',
            'file_short_text'        => 'File Short Text',
            'file_short_text_helper' => ' ',
            'due_date'               => 'Due Date',
            'due_date_helper'        => ' ',
            'accounting'             => 'Accounting',
            'accounting_helper'      => ' ',
        ],
    ],
    'upload' => [
        'title'          => 'Uploads',
        'title_singular' => 'Upload',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'date'               => 'Date',
            'date_helper'        => ' ',
            'accounting'         => 'Accounting',
            'accounting_helper'  => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'notice'             => 'Notice',
            'notice_helper'      => ' ',
            'team'               => 'Team',
            'team_helper'        => ' ',
            'upload_file'        => 'Upload File',
            'upload_file_helper' => ' ',
            'archive'            => 'Archive',
            'archive_helper'     => ' ',
            'closed'             => 'Closed',
            'closed_helper'      => ' ',
            'reply'              => 'Reply',
            'reply_helper'       => ' ',
        ],
    ],
    'bank' => [
        'title'          => 'Bank',
        'title_singular' => 'Bank',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'bank'              => 'Bank',
            'bank_helper'       => ' ',
            'swift'             => 'Swift',
            'swift_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nazov'             => 'Nazov',
            'nazov_helper'      => ' ',
            'activ'             => 'Activ',
            'activ_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'short_name'        => 'Short Name',
            'short_name_helper' => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'mmc'               => 'Mmc',
            'mmc_helper'        => ' ',
        ],
    ],
    'typ' => [
        'title'          => 'Typ',
        'title_singular' => 'Typ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'typ_sk'            => 'Typ SK',
            'typ_sk_helper'     => ' ',
            'typ_de'            => 'Typ DE',
            'typ_de_helper'     => ' ',
            'typ_en'            => 'Typ EN',
            'typ_en_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'znacka' => [
        'title'          => 'Znacka',
        'title_singular' => 'Znacka',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'znacka'            => 'Znacka',
            'znacka_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'ePost' => [
        'title'          => 'ePost',
        'title_singular' => 'ePost',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'date'                   => 'Date',
            'date_helper'            => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
            'sender'                 => 'Sender',
            'sender_helper'          => ' ',
            'scan'                   => 'Scan',
            'scan_helper'            => ' ',
            'zadal'                  => 'Zadal',
            'zadal_helper'           => ' ',
            'accounting'             => 'Accounting',
            'accounting_helper'      => ' ',
            'payment_info'           => 'Payment info',
            'payment_info_helper'    => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'iban'                   => 'IBAN',
            'iban_helper'            => ' ',
            'swift'                  => 'Swift/BIC',
            'swift_helper'           => ' ',
            'vs'                     => 'VS',
            'vs_helper'              => ' ',
            'ss'                     => 'SS',
            'ss_helper'              => ' ',
            'ks'                     => 'KS',
            'ks_helper'              => ' ',
            'for_recipient'          => 'For Recipient',
            'for_recipient_helper'   => ' ',
            'paid'                   => 'Paid',
            'paid_helper'            => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'dok_typ'                => 'Dok Typ',
            'dok_typ_helper'         => ' ',
            'title'                  => 'Title',
            'title_helper'           => ' ',
            'notice'                 => 'Notice',
            'notice_helper'          => ' ',
            'annex'                  => 'Annex',
            'annex_helper'           => ' ',
            'due_date'               => 'Due Date',
            'due_date_helper'        => ' ',
            'file_short_text'        => 'File Short Text',
            'file_short_text_helper' => ' ',
            'send_email'             => 'Send Email',
            'send_email_helper'      => ' ',
        ],
    ],
    'dokTyp' => [
        'title'          => 'Dok Typ',
        'title_singular' => 'Dok Typ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'dok_typ_sk'        => 'Dok Typ SK',
            'dok_typ_sk_helper' => ' ',
            'dok_typ_de'        => 'Dok Typ DE',
            'dok_typ_de_helper' => ' ',
            'dok_typ_en'        => 'Dok Typ EN',
            'dok_typ_en_helper' => ' ',
        ],
    ],
    'dokKat' => [
        'title'          => 'Dok Kat',
        'title_singular' => 'Dok Kat',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'dok_kat'           => 'Dok Kat',
            'dok_kat_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'lang' => [
        'title'          => 'Lang',
        'title_singular' => 'Lang',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
