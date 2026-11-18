<?php

return [
    'resource' => [
        'label' => 'Məxfilik insidenti',
        'plural_label' => 'Məxfilik insidentləri',
    ],

    'fields' => [
        'title' => 'Başlıq',
        'description' => 'Təsvir',
        'circumstances' => 'Hallar',
        'status' => 'Status',
        'risk' => 'Ciddi zərər riski',
        'discovered_at' => 'Xəbər tutulma tarixi',
        'occurred_at' => 'Baş verib',
        'notice_due_at' => 'Bildiriş tarixi',
        'data_categories' => 'Aidiyyəti olan məlumatlar',
        'affected_persons' => 'Aidiyyəti olan şəxslər',
        'sensitivity' => 'Məlumatların həssaslığı',
        'consequences' => 'İstifadəsinin gözlənilən nəticələri',
        'likelihood' => 'Zərərli istifadə ehtimalı',
        'measures' => 'Görülmüş tədbirlər',
        'cai' => 'CAI',
        'persons' => 'Şəxslər',
        'cai_notified_at' => 'CAI-yə bildirildi',
        'cai_reference' => 'CAI istinadı',
        'persons_notified_at' => 'Şəxslərə bildirildi',
        'persons_notice_delay_reason' => 'Şəxslərə bildirişin gözləmə səbəbi',
        'public_notice_at' => 'İctimai bildiriş',
        'public_notice_reason' => 'Niyə ictimai bildiriş',
        'notified_at' => 'Bildirilib',
        'keep_until' => 'Reyestrdə saxlanma tarixi',
        'closed_at' => 'Bağlanıb',
    ],

    'help' => [
        'discovered_at' => 'İnsidentdən nə vaxt xəbər tutdunuz. Bildiriş hədəfiniz buradan başlayır və sonradan dəyişdirilə bilməz.',
    ],

    'risk' => [
        'pending' => 'Qiymətləndirilir',
        'not_serious' => 'Ciddi zərər riski yoxdur',
        'serious' => 'Ciddi zərər riski',
    ],

    'status' => [
        'open' => 'Açıq',
        'pending' => 'Bildiriş gözləyir',
        'overdue' => 'Gecikmiş',
        'closed' => 'Bağlı',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Riski qiymətləndir',
            'description' => 'Məlumatların həssaslığını, istifadəsinin gözlənilən nəticələrini və zərərli məqsədlər üçün istifadə ehtimalını qiymətləndirin (maddə 3.7). Şəxsi məlumatların qorunmasına cavabdeh şəxslə məsləhətləşin. Ciddi zərər riski CAI-yə və aidiyyəti olan şəxslərə dərhal bildirilməlidir (maddə 3.5).',
            'success' => 'Risk qiymətləndirildi.',
        ],
        'notify_cai' => [
            'label' => 'CAI-yə bildirildi',
            'success' => 'CAI bildirişi qeyd edildi.',
        ],
        'notify_persons' => [
            'label' => 'Şəxslərə bildirildi',
            'success' => 'Şəxslərə bildiriş qeyd edildi.',
        ],
        'notify_publicly' => [
            'label' => 'İctimai bildiriş',
            'description' => 'Fərdi bildirişlər əvəzinə, hər bir şəxsə bildiriş həddindən artıq çətinlik yaradarsa, əlaqə məlumatları yoxdursa və ya vaxt azdırsa (əsasnamənin 5-ci maddəsi).',
            'success' => 'İctimai bildiriş qeyd edildi.',
        ],
        'defer' => [
            'label' => 'Şəxslərə bildirişi təxirə sal',
            'description' => 'Yalnız şəxslərə bildiriş araşdırmaya mane ola bildiyi müddətdə (maddə 3.5).',
            'success' => 'Səbəb qeyd edildi.',
        ],
        'close' => [
            'label' => 'Bağla',
            'success' => 'İnsident bağlandı.',
        ],
    ],
];
