<?php

return [
    'resource' => [
        'label' => 'Vertrouwelijkheidsincident',
        'plural_label' => 'Vertrouwelijkheidsincidenten',
    ],

    'fields' => [
        'title' => 'Titel',
        'description' => 'Beschrijving',
        'circumstances' => 'Omstandigheden',
        'status' => 'Status',
        'risk' => 'Risico op ernstige schade',
        'discovered_at' => 'Bekend geworden op',
        'occurred_at' => 'Opgetreden op',
        'notice_due_at' => 'Melden vóór',
        'data_categories' => 'Betrokken informatie',
        'affected_persons' => 'Betrokken personen',
        'sensitivity' => 'Gevoeligheid van de informatie',
        'consequences' => 'Verwachte gevolgen van het gebruik',
        'likelihood' => 'Waarschijnlijkheid van schadelijk gebruik',
        'measures' => 'Genomen maatregelen',
        'cai' => 'CAI',
        'persons' => 'Personen',
        'cai_notified_at' => 'CAI gemeld op',
        'cai_reference' => 'CAI-referentie',
        'persons_notified_at' => 'Personen gemeld op',
        'persons_notice_delay_reason' => 'Waarom de melding aan personen wacht',
        'public_notice_at' => 'Openbare kennisgeving op',
        'public_notice_reason' => 'Waarom een openbare kennisgeving',
        'notified_at' => 'Gemeld op',
        'keep_until' => 'Bewaren in het register tot',
        'closed_at' => 'Afgesloten op',
    ],

    'help' => [
        'discovered_at' => 'Wanneer je van het incident op de hoogte raakte. Je meldtermijn begint hier en kan later niet worden gewijzigd.',
    ],

    'risk' => [
        'pending' => 'In beoordeling',
        'not_serious' => 'Geen risico op ernstige schade',
        'serious' => 'Risico op ernstige schade',
    ],

    'status' => [
        'open' => 'Open',
        'pending' => 'Melding openstaand',
        'overdue' => 'Te laat',
        'closed' => 'Afgesloten',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Risico beoordelen',
            'description' => 'Weeg de gevoeligheid van de informatie, de verwachte gevolgen van het gebruik en de waarschijnlijkheid van gebruik voor schadelijke doeleinden af (art. 3.7). Raadpleeg de persoon die verantwoordelijk is voor de bescherming van persoonlijke informatie. Een risico op ernstige schade moet onverwijld worden gemeld aan de CAI en de betrokken personen (art. 3.5).',
            'success' => 'Risico beoordeeld.',
        ],
        'notify_cai' => [
            'label' => 'CAI gemeld',
            'success' => 'CAI-melding vastgelegd.',
        ],
        'notify_persons' => [
            'label' => 'Personen gemeld',
            'success' => 'Melding aan personen vastgelegd.',
        ],
        'notify_publicly' => [
            'label' => 'Openbare kennisgeving',
            'description' => 'In plaats van individuele meldingen, wanneer het melden aan elke persoon buitensporig bezwaarlijk zou zijn, contactgegevens ontbreken of de tijd kort is (art. 5 van het reglement).',
            'success' => 'Openbare kennisgeving vastgelegd.',
        ],
        'defer' => [
            'label' => 'Melding aan personen uitstellen',
            'description' => 'Alleen zolang het melden aan de personen een onderzoek kan belemmeren (art. 3.5).',
            'success' => 'Reden vastgelegd.',
        ],
        'close' => [
            'label' => 'Afsluiten',
            'success' => 'Incident gesloten.',
        ],
    ],
];
