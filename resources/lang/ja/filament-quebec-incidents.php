<?php

return [
    'resource' => [
        'label' => '機密性インシデント',
        'plural_label' => '機密性インシデント',
    ],

    'fields' => [
        'title' => 'タイトル',
        'description' => '説明',
        'circumstances' => '状況',
        'status' => 'ステータス',
        'risk' => '重大な損害のリスク',
        'discovered_at' => '認知日時',
        'occurred_at' => '発生日時',
        'notice_due_at' => '通知期限',
        'data_categories' => '対象の情報',
        'affected_persons' => '対象者',
        'sensitivity' => '情報のセンシティブ性',
        'consequences' => '利用により予想される結果',
        'likelihood' => '有害な利用の可能性',
        'measures' => '講じた措置',
        'cai' => 'CAI',
        'persons' => '本人',
        'cai_notified_at' => 'CAI への通知日時',
        'cai_reference' => 'CAI 参照番号',
        'persons_notified_at' => '本人への通知日時',
        'persons_notice_delay_reason' => '本人への通知を保留する理由',
        'public_notice_at' => '公告日時',
        'public_notice_reason' => '公告とする理由',
        'notified_at' => '通知日時',
        'keep_until' => '登録簿の保管期限',
        'closed_at' => '完了日時',
    ],

    'help' => [
        'discovered_at' => 'インシデントを認識した日時。通知目標はここから始まり、後から変更できません。',
    ],

    'risk' => [
        'pending' => '評価中',
        'not_serious' => '重大な損害のリスクなし',
        'serious' => '重大な損害のリスク',
    ],

    'status' => [
        'open' => '対応中',
        'pending' => '通知待ち',
        'overdue' => '期限切れ',
        'closed' => '完了',
    ],

    'actions' => [
        'assess' => [
            'label' => 'リスクを評価',
            'description' => '情報のセンシティブ性、利用により予想される結果、有害な目的で利用される可能性を検討してください（第3.7条）。個人情報保護責任者に相談してください。重大な損害のリスクがある場合は、CAI と対象者に速やかに通知しなければなりません（第3.5条）。',
            'success' => 'リスクを評価しました。',
        ],
        'notify_cai' => [
            'label' => 'CAI に通知済み',
            'success' => 'CAI への通知を記録しました。',
        ],
        'notify_persons' => [
            'label' => '本人に通知済み',
            'success' => '本人への通知を記録しました。',
        ],
        'notify_publicly' => [
            'label' => '公告',
            'description' => '各人への通知が過度な負担となる場合、連絡先がない場合、または時間がない場合に、個別通知の代わりに行います（規則第5条）。',
            'success' => '公告を記録しました。',
        ],
        'defer' => [
            'label' => '本人への通知を保留',
            'description' => '本人への通知が調査の妨げとなるおそれがある間に限ります（第3.5条）。',
            'success' => '理由を記録しました。',
        ],
        'close' => [
            'label' => '完了にする',
            'success' => 'インシデントをクローズしました。',
        ],
    ],
];
