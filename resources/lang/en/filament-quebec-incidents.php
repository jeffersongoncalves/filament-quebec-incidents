<?php

return [
    'resource' => [
        'label' => 'Confidentiality incident',
        'plural_label' => 'Confidentiality incidents',
    ],

    'fields' => [
        'title' => 'Title',
        'description' => 'Description',
        'circumstances' => 'Circumstances',
        'status' => 'Status',
        'risk' => 'Risk of serious injury',
        'discovered_at' => 'Became aware at',
        'occurred_at' => 'Occurred at',
        'notice_due_at' => 'Notify by',
        'data_categories' => 'Information concerned',
        'affected_persons' => 'Persons concerned',
        'sensitivity' => 'Sensitivity of the information',
        'consequences' => 'Anticipated consequences of its use',
        'likelihood' => 'Likelihood of injurious use',
        'measures' => 'Measures taken',
        'cai' => 'CAI',
        'persons' => 'Persons',
        'cai_notified_at' => 'CAI notified at',
        'cai_reference' => 'CAI reference',
        'persons_notified_at' => 'Persons notified at',
        'persons_notice_delay_reason' => 'Why the persons\' notice waits',
        'public_notice_at' => 'Public notice at',
        'public_notice_reason' => 'Why a public notice',
        'notified_at' => 'Notified at',
        'keep_until' => 'Keep in the register until',
        'closed_at' => 'Closed at',
    ],

    'help' => [
        'discovered_at' => 'When you became aware of the incident. Your notice target starts here and cannot be changed later.',
    ],

    'risk' => [
        'pending' => 'Under assessment',
        'not_serious' => 'No risk of serious injury',
        'serious' => 'Risk of serious injury',
    ],

    'status' => [
        'open' => 'Open',
        'pending' => 'Notice pending',
        'overdue' => 'Overdue',
        'closed' => 'Closed',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Assess risk',
            'description' => 'Weigh the sensitivity of the information, the anticipated consequences of its use and the likelihood that it will be used for injurious purposes (s. 3.7). Consult the person in charge of the protection of personal information. A risk of serious injury must be notified promptly to the CAI and to the persons concerned (s. 3.5).',
            'success' => 'Risk assessed.',
        ],
        'notify_cai' => [
            'label' => 'CAI notified',
            'success' => 'CAI notice recorded.',
        ],
        'notify_persons' => [
            'label' => 'Persons notified',
            'success' => 'Persons notice recorded.',
        ],
        'notify_publicly' => [
            'label' => 'Public notice',
            'description' => 'Instead of individual notices, when notifying each person would cause excessive hardship, their contact details are missing, or time is short (s. 5 of the regulation).',
            'success' => 'Public notice recorded.',
        ],
        'defer' => [
            'label' => 'Defer the persons\' notice',
            'description' => 'Only while notifying the persons could hamper an investigation (s. 3.5).',
            'success' => 'Reason recorded.',
        ],
        'close' => [
            'label' => 'Close',
            'success' => 'Incident closed.',
        ],
    ],
];
