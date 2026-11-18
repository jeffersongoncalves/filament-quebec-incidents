<?php

return [
    'resource' => [
        'label' => 'Gizlilik olayı',
        'plural_label' => 'Gizlilik olayları',
    ],

    'fields' => [
        'title' => 'Başlık',
        'description' => 'Açıklama',
        'circumstances' => 'Koşullar',
        'status' => 'Durum',
        'risk' => 'Ciddi zarar riski',
        'discovered_at' => 'Öğrenilme tarihi',
        'occurred_at' => 'Gerçekleşme',
        'notice_due_at' => 'Bildirim tarihi',
        'data_categories' => 'İlgili bilgiler',
        'affected_persons' => 'İlgili kişiler',
        'sensitivity' => 'Bilgilerin hassasiyeti',
        'consequences' => 'Kullanımının öngörülen sonuçları',
        'likelihood' => 'Zararlı kullanım olasılığı',
        'measures' => 'Alınan önlemler',
        'cai' => 'CAI',
        'persons' => 'Kişiler',
        'cai_notified_at' => 'CAI\'ye bildirildi',
        'cai_reference' => 'CAI referansı',
        'persons_notified_at' => 'Kişilere bildirildi',
        'persons_notice_delay_reason' => 'Kişilere bildirimin neden beklediği',
        'public_notice_at' => 'Kamuya duyuru',
        'public_notice_reason' => 'Neden kamuya duyuru',
        'notified_at' => 'Bildirilme',
        'keep_until' => 'Kayıtta saklama tarihi',
        'closed_at' => 'Kapanma',
    ],

    'help' => [
        'discovered_at' => 'Olaydan ne zaman haberdar olduğunuz. Bildirim hedefiniz burada başlar ve daha sonra değiştirilemez.',
    ],

    'risk' => [
        'pending' => 'Değerlendiriliyor',
        'not_serious' => 'Ciddi zarar riski yok',
        'serious' => 'Ciddi zarar riski',
    ],

    'status' => [
        'open' => 'Açık',
        'pending' => 'Bildirim bekliyor',
        'overdue' => 'Süresi geçmiş',
        'closed' => 'Kapalı',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Riski değerlendir',
            'description' => 'Bilgilerin hassasiyetini, kullanımının öngörülen sonuçlarını ve zararlı amaçlarla kullanılma olasılığını değerlendirin (md. 3.7). Kişisel bilgilerin korunmasından sorumlu kişiye danışın. Ciddi zarar riski CAI\'ye ve ilgili kişilere derhal bildirilmelidir (md. 3.5).',
            'success' => 'Risk değerlendirildi.',
        ],
        'notify_cai' => [
            'label' => 'CAI\'ye bildirildi',
            'success' => 'CAI bildirimi kaydedildi.',
        ],
        'notify_persons' => [
            'label' => 'Kişilere bildirildi',
            'success' => 'Kişilere bildirim kaydedildi.',
        ],
        'notify_publicly' => [
            'label' => 'Kamuya duyuru',
            'description' => 'Bireysel bildirimler yerine, her kişiye bildirim aşırı güçlük yaratacaksa, iletişim bilgileri yoksa veya zaman kısaysa (yönetmeliğin 5. maddesi).',
            'success' => 'Kamuya duyuru kaydedildi.',
        ],
        'defer' => [
            'label' => 'Kişilere bildirimi ertele',
            'description' => 'Yalnızca kişilere bildirim bir soruşturmayı engelleyebileceği sürece (md. 3.5).',
            'success' => 'Gerekçe kaydedildi.',
        ],
        'close' => [
            'label' => 'Kapat',
            'success' => 'Olay kapatıldı.',
        ],
    ],
];
