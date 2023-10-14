<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'property_access',
            ],
            [
                'id'    => 18,
                'title' => 'post_property_access',
            ],
            [
                'id'    => 19,
                'title' => 'stat_create',
            ],
            [
                'id'    => 20,
                'title' => 'stat_edit',
            ],
            [
                'id'    => 21,
                'title' => 'stat_show',
            ],
            [
                'id'    => 22,
                'title' => 'stat_delete',
            ],
            [
                'id'    => 23,
                'title' => 'stat_access',
            ],
            [
                'id'    => 24,
                'title' => 'sender_create',
            ],
            [
                'id'    => 25,
                'title' => 'sender_edit',
            ],
            [
                'id'    => 26,
                'title' => 'sender_show',
            ],
            [
                'id'    => 27,
                'title' => 'sender_delete',
            ],
            [
                'id'    => 28,
                'title' => 'sender_access',
            ],
            [
                'id'    => 29,
                'title' => 'status_create',
            ],
            [
                'id'    => 30,
                'title' => 'status_edit',
            ],
            [
                'id'    => 31,
                'title' => 'status_show',
            ],
            [
                'id'    => 32,
                'title' => 'status_delete',
            ],
            [
                'id'    => 33,
                'title' => 'status_access',
            ],
            [
                'id'    => 34,
                'title' => 'postform_create',
            ],
            [
                'id'    => 35,
                'title' => 'postform_edit',
            ],
            [
                'id'    => 36,
                'title' => 'postform_show',
            ],
            [
                'id'    => 37,
                'title' => 'postform_delete',
            ],
            [
                'id'    => 38,
                'title' => 'postform_access',
            ],
            [
                'id'    => 39,
                'title' => 'query_create',
            ],
            [
                'id'    => 40,
                'title' => 'query_edit',
            ],
            [
                'id'    => 41,
                'title' => 'query_show',
            ],
            [
                'id'    => 42,
                'title' => 'query_delete',
            ],
            [
                'id'    => 43,
                'title' => 'query_access',
            ],
            [
                'id'    => 44,
                'title' => 'input_create',
            ],
            [
                'id'    => 45,
                'title' => 'input_edit',
            ],
            [
                'id'    => 46,
                'title' => 'input_show',
            ],
            [
                'id'    => 47,
                'title' => 'input_delete',
            ],
            [
                'id'    => 48,
                'title' => 'input_access',
            ],
            [
                'id'    => 49,
                'title' => 'processed_create',
            ],
            [
                'id'    => 50,
                'title' => 'processed_edit',
            ],
            [
                'id'    => 51,
                'title' => 'processed_show',
            ],
            [
                'id'    => 52,
                'title' => 'processed_delete',
            ],
            [
                'id'    => 53,
                'title' => 'processed_access',
            ],
            [
                'id'    => 54,
                'title' => 'firma_property_access',
            ],
            [
                'id'    => 55,
                'title' => 'spracovany_create',
            ],
            [
                'id'    => 56,
                'title' => 'spracovany_edit',
            ],
            [
                'id'    => 57,
                'title' => 'spracovany_show',
            ],
            [
                'id'    => 58,
                'title' => 'spracovany_delete',
            ],
            [
                'id'    => 59,
                'title' => 'spracovany_access',
            ],
            [
                'id'    => 60,
                'title' => 'ucto_create',
            ],
            [
                'id'    => 61,
                'title' => 'ucto_edit',
            ],
            [
                'id'    => 62,
                'title' => 'ucto_show',
            ],
            [
                'id'    => 63,
                'title' => 'ucto_delete',
            ],
            [
                'id'    => 64,
                'title' => 'ucto_access',
            ],
            [
                'id'    => 65,
                'title' => 'e_schranka_create',
            ],
            [
                'id'    => 66,
                'title' => 'e_schranka_edit',
            ],
            [
                'id'    => 67,
                'title' => 'e_schranka_show',
            ],
            [
                'id'    => 68,
                'title' => 'e_schranka_delete',
            ],
            [
                'id'    => 69,
                'title' => 'e_schranka_access',
            ],
            [
                'id'    => 70,
                'title' => 'invoice_property_access',
            ],
            [
                'id'    => 71,
                'title' => 'nasa_create',
            ],
            [
                'id'    => 72,
                'title' => 'nasa_edit',
            ],
            [
                'id'    => 73,
                'title' => 'nasa_show',
            ],
            [
                'id'    => 74,
                'title' => 'nasa_delete',
            ],
            [
                'id'    => 75,
                'title' => 'nasa_access',
            ],
            [
                'id'    => 76,
                'title' => 'firma_create',
            ],
            [
                'id'    => 77,
                'title' => 'firma_edit',
            ],
            [
                'id'    => 78,
                'title' => 'firma_show',
            ],
            [
                'id'    => 79,
                'title' => 'firma_delete',
            ],
            [
                'id'    => 80,
                'title' => 'firma_access',
            ],
            [
                'id'    => 81,
                'title' => 'post_create',
            ],
            [
                'id'    => 82,
                'title' => 'post_edit',
            ],
            [
                'id'    => 83,
                'title' => 'post_show',
            ],
            [
                'id'    => 84,
                'title' => 'post_delete',
            ],
            [
                'id'    => 85,
                'title' => 'post_access',
            ],
            [
                'id'    => 86,
                'title' => 'notice_create',
            ],
            [
                'id'    => 87,
                'title' => 'notice_edit',
            ],
            [
                'id'    => 88,
                'title' => 'notice_show',
            ],
            [
                'id'    => 89,
                'title' => 'notice_delete',
            ],
            [
                'id'    => 90,
                'title' => 'notice_access',
            ],
            [
                'id'    => 91,
                'title' => 'call_property_access',
            ],
            [
                'id'    => 92,
                'title' => 'call_typ_create',
            ],
            [
                'id'    => 93,
                'title' => 'call_typ_edit',
            ],
            [
                'id'    => 94,
                'title' => 'call_typ_show',
            ],
            [
                'id'    => 95,
                'title' => 'call_typ_delete',
            ],
            [
                'id'    => 96,
                'title' => 'call_typ_access',
            ],
            [
                'id'    => 97,
                'title' => 'call_create',
            ],
            [
                'id'    => 98,
                'title' => 'call_edit',
            ],
            [
                'id'    => 99,
                'title' => 'call_show',
            ],
            [
                'id'    => 100,
                'title' => 'call_delete',
            ],
            [
                'id'    => 101,
                'title' => 'call_access',
            ],
            [
                'id'    => 102,
                'title' => 'invoice_typ_create',
            ],
            [
                'id'    => 103,
                'title' => 'invoice_typ_edit',
            ],
            [
                'id'    => 104,
                'title' => 'invoice_typ_show',
            ],
            [
                'id'    => 105,
                'title' => 'invoice_typ_delete',
            ],
            [
                'id'    => 106,
                'title' => 'invoice_typ_access',
            ],
            [
                'id'    => 107,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 108,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 109,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 110,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 111,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 112,
                'title' => 'car_property_access',
            ],
            [
                'id'    => 113,
                'title' => 'insurance_create',
            ],
            [
                'id'    => 114,
                'title' => 'insurance_edit',
            ],
            [
                'id'    => 115,
                'title' => 'insurance_show',
            ],
            [
                'id'    => 116,
                'title' => 'insurance_delete',
            ],
            [
                'id'    => 117,
                'title' => 'insurance_access',
            ],
            [
                'id'    => 118,
                'title' => 'car_create',
            ],
            [
                'id'    => 119,
                'title' => 'car_edit',
            ],
            [
                'id'    => 120,
                'title' => 'car_show',
            ],
            [
                'id'    => 121,
                'title' => 'car_delete',
            ],
            [
                'id'    => 122,
                'title' => 'car_access',
            ],
            [
                'id'    => 123,
                'title' => 'recipient_create',
            ],
            [
                'id'    => 124,
                'title' => 'recipient_edit',
            ],
            [
                'id'    => 125,
                'title' => 'recipient_show',
            ],
            [
                'id'    => 126,
                'title' => 'recipient_delete',
            ],
            [
                'id'    => 127,
                'title' => 'recipient_access',
            ],
            [
                'id'    => 128,
                'title' => 'outgoing_post_create',
            ],
            [
                'id'    => 129,
                'title' => 'outgoing_post_edit',
            ],
            [
                'id'    => 130,
                'title' => 'outgoing_post_show',
            ],
            [
                'id'    => 131,
                'title' => 'outgoing_post_delete',
            ],
            [
                'id'    => 132,
                'title' => 'outgoing_post_access',
            ],
            [
                'id'    => 133,
                'title' => 'doc_property_access',
            ],
            [
                'id'    => 134,
                'title' => 'document_create',
            ],
            [
                'id'    => 135,
                'title' => 'document_edit',
            ],
            [
                'id'    => 136,
                'title' => 'document_show',
            ],
            [
                'id'    => 137,
                'title' => 'document_delete',
            ],
            [
                'id'    => 138,
                'title' => 'document_access',
            ],
            [
                'id'    => 139,
                'title' => 'upload_create',
            ],
            [
                'id'    => 140,
                'title' => 'upload_edit',
            ],
            [
                'id'    => 141,
                'title' => 'upload_show',
            ],
            [
                'id'    => 142,
                'title' => 'upload_delete',
            ],
            [
                'id'    => 143,
                'title' => 'upload_access',
            ],
            [
                'id'    => 144,
                'title' => 'bank_create',
            ],
            [
                'id'    => 145,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 146,
                'title' => 'bank_show',
            ],
            [
                'id'    => 147,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 148,
                'title' => 'bank_access',
            ],
            [
                'id'    => 149,
                'title' => 'team_create',
            ],
            [
                'id'    => 150,
                'title' => 'team_edit',
            ],
            [
                'id'    => 151,
                'title' => 'team_show',
            ],
            [
                'id'    => 152,
                'title' => 'team_delete',
            ],
            [
                'id'    => 153,
                'title' => 'team_access',
            ],
            [
                'id'    => 154,
                'title' => 'typ_create',
            ],
            [
                'id'    => 155,
                'title' => 'typ_edit',
            ],
            [
                'id'    => 156,
                'title' => 'typ_show',
            ],
            [
                'id'    => 157,
                'title' => 'typ_delete',
            ],
            [
                'id'    => 158,
                'title' => 'typ_access',
            ],
            [
                'id'    => 159,
                'title' => 'znacka_create',
            ],
            [
                'id'    => 160,
                'title' => 'znacka_edit',
            ],
            [
                'id'    => 161,
                'title' => 'znacka_show',
            ],
            [
                'id'    => 162,
                'title' => 'znacka_delete',
            ],
            [
                'id'    => 163,
                'title' => 'znacka_access',
            ],
            [
                'id'    => 164,
                'title' => 'e_post_create',
            ],
            [
                'id'    => 165,
                'title' => 'e_post_edit',
            ],
            [
                'id'    => 166,
                'title' => 'e_post_show',
            ],
            [
                'id'    => 167,
                'title' => 'e_post_delete',
            ],
            [
                'id'    => 168,
                'title' => 'e_post_access',
            ],
            [
                'id'    => 169,
                'title' => 'dok_typ_create',
            ],
            [
                'id'    => 170,
                'title' => 'dok_typ_edit',
            ],
            [
                'id'    => 171,
                'title' => 'dok_typ_show',
            ],
            [
                'id'    => 172,
                'title' => 'dok_typ_delete',
            ],
            [
                'id'    => 173,
                'title' => 'dok_typ_access',
            ],
            [
                'id'    => 174,
                'title' => 'dok_kat_create',
            ],
            [
                'id'    => 175,
                'title' => 'dok_kat_edit',
            ],
            [
                'id'    => 176,
                'title' => 'dok_kat_show',
            ],
            [
                'id'    => 177,
                'title' => 'dok_kat_delete',
            ],
            [
                'id'    => 178,
                'title' => 'dok_kat_access',
            ],
            [
                'id'    => 179,
                'title' => 'lang_create',
            ],
            [
                'id'    => 180,
                'title' => 'lang_edit',
            ],
            [
                'id'    => 181,
                'title' => 'lang_show',
            ],
            [
                'id'    => 182,
                'title' => 'lang_delete',
            ],
            [
                'id'    => 183,
                'title' => 'lang_access',
            ],
            [
                'id'    => 184,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
