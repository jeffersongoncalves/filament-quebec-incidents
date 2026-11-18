<?php

return [
    'resource' => [
        'label' => 'Maxfiylik hodisasi',
        'plural_label' => 'Maxfiylik hodisalari',
    ],

    'fields' => [
        'title' => 'Sarlavha',
        'description' => 'Tavsif',
        'circumstances' => 'Holatlar',
        'status' => 'Holat',
        'risk' => 'Jiddiy zarar xavfi',
        'discovered_at' => 'Xabar topilgan vaqt',
        'occurred_at' => 'Sodir bo\'lgan vaqt',
        'notice_due_at' => 'Xabar berish muddati',
        'data_categories' => 'Tegishli axborot',
        'affected_persons' => 'Tegishli shaxslar',
        'sensitivity' => 'Axborotning nozikligi',
        'consequences' => 'Undan foydalanishning kutilayotgan oqibatlari',
        'likelihood' => 'Zararli foydalanish ehtimoli',
        'measures' => 'Ko\'rilgan choralar',
        'cai' => 'CAI',
        'persons' => 'Shaxslar',
        'cai_notified_at' => 'CAI ga xabar berildi',
        'cai_reference' => 'CAI havolasi',
        'persons_notified_at' => 'Shaxslarga xabar berildi',
        'persons_notice_delay_reason' => 'Shaxslarga xabar nima uchun kutmoqda',
        'public_notice_at' => 'Ommaviy xabar',
        'public_notice_reason' => 'Nima uchun ommaviy xabar',
        'notified_at' => 'Xabar berilgan',
        'keep_until' => 'Reyestrda saqlash muddati',
        'closed_at' => 'Yopilgan',
    ],

    'help' => [
        'discovered_at' => 'Hodisadan qachon xabardor bo\'lganingiz. Xabar berish maqsadi shu yerdan boshlanadi va keyinroq o\'zgartirib bo\'lmaydi.',
    ],

    'risk' => [
        'pending' => 'Baholanmoqda',
        'not_serious' => 'Jiddiy zarar xavfi yo\'q',
        'serious' => 'Jiddiy zarar xavfi',
    ],

    'status' => [
        'open' => 'Ochiq',
        'pending' => 'Xabar kutilmoqda',
        'overdue' => 'Muddati o\'tgan',
        'closed' => 'Yopilgan',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Xavfni baholash',
            'description' => 'Axborotning nozikligini, undan foydalanishning kutilayotgan oqibatlarini va zararli maqsadlarda foydalanilish ehtimolini baholang (3.7-modda). Shaxsiy axborotni himoya qilish uchun mas\'ul shaxs bilan maslahatlashing. Jiddiy zarar xavfi haqida CAI va tegishli shaxslarga zudlik bilan xabar berilishi kerak (3.5-modda).',
            'success' => 'Xavf baholandi.',
        ],
        'notify_cai' => [
            'label' => 'CAI ga xabar berildi',
            'success' => 'CAI xabari qayd etildi.',
        ],
        'notify_persons' => [
            'label' => 'Shaxslarga xabar berildi',
            'success' => 'Shaxslarga xabar qayd etildi.',
        ],
        'notify_publicly' => [
            'label' => 'Ommaviy xabar',
            'description' => 'Alohida xabarlar o\'rniga, har bir shaxsga xabar berish haddan tashqari qiyin bo\'lsa, aloqa ma\'lumotlari bo\'lmasa yoki vaqt kam bo\'lsa (nizomning 5-moddasi).',
            'success' => 'Ommaviy xabar qayd etildi.',
        ],
        'defer' => [
            'label' => 'Shaxslarga xabarni kechiktirish',
            'description' => 'Faqat shaxslarga xabar berish tergovga to\'sqinlik qilishi mumkin bo\'lgan vaqtda (3.5-modda).',
            'success' => 'Sabab qayd etildi.',
        ],
        'close' => [
            'label' => 'Yopish',
            'success' => 'Hodisa yopildi.',
        ],
    ],
];
