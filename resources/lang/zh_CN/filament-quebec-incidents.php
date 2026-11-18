<?php

return [
    'resource' => [
        'label' => '保密事件',
        'plural_label' => '保密事件',
    ],

    'fields' => [
        'title' => '标题',
        'description' => '描述',
        'circumstances' => '情况',
        'status' => '状态',
        'risk' => '严重损害风险',
        'discovered_at' => '知悉时间',
        'occurred_at' => '发生时间',
        'notice_due_at' => '通知截止',
        'data_categories' => '涉及的信息',
        'affected_persons' => '当事人',
        'sensitivity' => '信息的敏感性',
        'consequences' => '其使用的预期后果',
        'likelihood' => '被恶意使用的可能性',
        'measures' => '已采取的措施',
        'cai' => 'CAI',
        'persons' => '当事人',
        'cai_notified_at' => '已通知 CAI 于',
        'cai_reference' => 'CAI 编号',
        'persons_notified_at' => '已通知当事人于',
        'persons_notice_delay_reason' => '推迟通知当事人的原因',
        'public_notice_at' => '公开通知于',
        'public_notice_reason' => '为何公开通知',
        'notified_at' => '通知时间',
        'keep_until' => '登记册保存至',
        'closed_at' => '关闭时间',
    ],

    'help' => [
        'discovered_at' => '您知悉该事件的时间。通知目标期限从此开始计算，之后无法更改。',
    ],

    'risk' => [
        'pending' => '评估中',
        'not_serious' => '无严重损害风险',
        'serious' => '严重损害风险',
    ],

    'status' => [
        'open' => '处理中',
        'pending' => '待通知',
        'overdue' => '已逾期',
        'closed' => '已关闭',
    ],

    'actions' => [
        'assess' => [
            'label' => '评估风险',
            'description' => '权衡信息的敏感性、其使用的预期后果以及被用于有害目的的可能性（第3.7条）。请咨询个人信息保护负责人。存在严重损害风险时，必须及时通知 CAI 和当事人（第3.5条）。',
            'success' => '已评估风险。',
        ],
        'notify_cai' => [
            'label' => '已通知 CAI',
            'success' => '已记录 CAI 通知。',
        ],
        'notify_persons' => [
            'label' => '已通知当事人',
            'success' => '已记录当事人通知。',
        ],
        'notify_publicly' => [
            'label' => '公开通知',
            'description' => '在逐一通知每个人会造成过度负担、缺少联系方式或时间紧迫时，用以代替个别通知（条例第5条）。',
            'success' => '已记录公开通知。',
        ],
        'defer' => [
            'label' => '推迟通知当事人',
            'description' => '仅在通知当事人可能妨碍调查期间适用（第3.5条）。',
            'success' => '已记录原因。',
        ],
        'close' => [
            'label' => '关闭',
            'success' => '事件已关闭。',
        ],
    ],
];
