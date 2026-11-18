<?php

return [
    'resource' => [
        'label' => 'Incidente di riservatezza',
        'plural_label' => 'Incidenti di riservatezza',
    ],

    'fields' => [
        'title' => 'Titolo',
        'description' => 'Descrizione',
        'circumstances' => 'Circostanze',
        'status' => 'Stato',
        'risk' => 'Rischio di pregiudizio grave',
        'discovered_at' => 'Venuto a conoscenza il',
        'occurred_at' => 'Avvenuto il',
        'notice_due_at' => 'Notificare entro',
        'data_categories' => 'Informazioni interessate',
        'affected_persons' => 'Persone interessate',
        'sensitivity' => 'Sensibilità delle informazioni',
        'consequences' => 'Conseguenze previste del loro uso',
        'likelihood' => 'Probabilità di uso pregiudizievole',
        'measures' => 'Misure adottate',
        'cai' => 'CAI',
        'persons' => 'Persone',
        'cai_notified_at' => 'CAI notificata il',
        'cai_reference' => 'Riferimento CAI',
        'persons_notified_at' => 'Persone notificate il',
        'persons_notice_delay_reason' => 'Perché la notifica alle persone è rinviata',
        'public_notice_at' => 'Avviso pubblico il',
        'public_notice_reason' => 'Perché un avviso pubblico',
        'notified_at' => 'Notificato il',
        'keep_until' => 'Conservare nel registro fino al',
        'closed_at' => 'Chiuso il',
    ],

    'help' => [
        'discovered_at' => 'Quando sei venuto a conoscenza dell\'incidente. Il termine obiettivo di notifica parte da qui e non può essere modificato in seguito.',
    ],

    'risk' => [
        'pending' => 'In valutazione',
        'not_serious' => 'Nessun rischio di pregiudizio grave',
        'serious' => 'Rischio di pregiudizio grave',
    ],

    'status' => [
        'open' => 'Aperto',
        'pending' => 'Notifica in sospeso',
        'overdue' => 'Scaduto',
        'closed' => 'Chiuso',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Valuta il rischio',
            'description' => 'Valuta la sensibilità delle informazioni, le conseguenze previste del loro uso e la probabilità che vengano usate per scopi pregiudizievoli (art. 3.7). Consulta il responsabile della protezione delle informazioni personali. Un rischio di pregiudizio grave va notificato tempestivamente alla CAI e alle persone interessate (art. 3.5).',
            'success' => 'Rischio valutato.',
        ],
        'notify_cai' => [
            'label' => 'CAI notificata',
            'success' => 'Notifica alla CAI registrata.',
        ],
        'notify_persons' => [
            'label' => 'Persone notificate',
            'success' => 'Notifica alle persone registrata.',
        ],
        'notify_publicly' => [
            'label' => 'Avviso pubblico',
            'description' => 'Al posto degli avvisi individuali, quando notificare ogni persona causerebbe un onere eccessivo, mancano i recapiti o il tempo è poco (art. 5 del regolamento).',
            'success' => 'Avviso pubblico registrato.',
        ],
        'defer' => [
            'label' => 'Rinvia la notifica alle persone',
            'description' => 'Solo finché notificare le persone potrebbe ostacolare un\'indagine (art. 3.5).',
            'success' => 'Motivo registrato.',
        ],
        'close' => [
            'label' => 'Chiudi',
            'success' => 'Incidente chiuso.',
        ],
    ],
];
