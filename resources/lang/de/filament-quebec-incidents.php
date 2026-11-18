<?php

return [
    'resource' => [
        'label' => 'Vertraulichkeitsvorfall',
        'plural_label' => 'Vertraulichkeitsvorfälle',
    ],

    'fields' => [
        'title' => 'Titel',
        'description' => 'Beschreibung',
        'circumstances' => 'Umstände',
        'status' => 'Status',
        'risk' => 'Risiko eines ernsthaften Schadens',
        'discovered_at' => 'Kenntnis erlangt am',
        'occurred_at' => 'Eingetreten am',
        'notice_due_at' => 'Melden bis',
        'data_categories' => 'Betroffene Informationen',
        'affected_persons' => 'Betroffene Personen',
        'sensitivity' => 'Sensibilität der Informationen',
        'consequences' => 'Voraussichtliche Folgen ihrer Verwendung',
        'likelihood' => 'Wahrscheinlichkeit einer schädlichen Verwendung',
        'measures' => 'Ergriffene Maßnahmen',
        'cai' => 'CAI',
        'persons' => 'Personen',
        'cai_notified_at' => 'CAI benachrichtigt am',
        'cai_reference' => 'CAI-Aktenzeichen',
        'persons_notified_at' => 'Personen benachrichtigt am',
        'persons_notice_delay_reason' => 'Warum die Benachrichtigung der Personen wartet',
        'public_notice_at' => 'Öffentliche Bekanntmachung am',
        'public_notice_reason' => 'Warum eine öffentliche Bekanntmachung',
        'notified_at' => 'Gemeldet am',
        'keep_until' => 'Im Register aufbewahren bis',
        'closed_at' => 'Abgeschlossen am',
    ],

    'help' => [
        'discovered_at' => 'Wann Sie von dem Vorfall Kenntnis erlangt haben. Ihr Meldeziel beginnt hier und kann später nicht geändert werden.',
    ],

    'risk' => [
        'pending' => 'In Bewertung',
        'not_serious' => 'Kein Risiko eines ernsthaften Schadens',
        'serious' => 'Risiko eines ernsthaften Schadens',
    ],

    'status' => [
        'open' => 'Offen',
        'pending' => 'Meldung ausstehend',
        'overdue' => 'Überfällig',
        'closed' => 'Abgeschlossen',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Risiko bewerten',
            'description' => 'Wägen Sie die Sensibilität der Informationen, die voraussichtlichen Folgen ihrer Verwendung und die Wahrscheinlichkeit einer Verwendung zu schädlichen Zwecken ab (Art. 3.7). Konsultieren Sie die für den Schutz personenbezogener Informationen verantwortliche Person. Ein Risiko eines ernsthaften Schadens ist der CAI und den betroffenen Personen unverzüglich zu melden (Art. 3.5).',
            'success' => 'Risiko bewertet.',
        ],
        'notify_cai' => [
            'label' => 'CAI benachrichtigt',
            'success' => 'CAI-Meldung erfasst.',
        ],
        'notify_persons' => [
            'label' => 'Personen benachrichtigt',
            'success' => 'Benachrichtigung der Personen erfasst.',
        ],
        'notify_publicly' => [
            'label' => 'Öffentliche Bekanntmachung',
            'description' => 'Anstelle einzelner Benachrichtigungen, wenn die Benachrichtigung jeder Person eine übermäßige Härte wäre, Kontaktdaten fehlen oder die Zeit knapp ist (Art. 5 der Verordnung).',
            'success' => 'Öffentliche Bekanntmachung erfasst.',
        ],
        'defer' => [
            'label' => 'Benachrichtigung der Personen aufschieben',
            'description' => 'Nur solange die Benachrichtigung der Personen eine Untersuchung behindern könnte (Art. 3.5).',
            'success' => 'Grund erfasst.',
        ],
        'close' => [
            'label' => 'Abschließen',
            'success' => 'Vorfall abgeschlossen.',
        ],
    ],
];
