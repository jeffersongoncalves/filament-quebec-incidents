<?php

return [
    'resource' => [
        'label' => 'Incydent poufności',
        'plural_label' => 'Incydenty poufności',
    ],

    'fields' => [
        'title' => 'Tytuł',
        'description' => 'Opis',
        'circumstances' => 'Okoliczności',
        'status' => 'Status',
        'risk' => 'Ryzyko poważnej szkody',
        'discovered_at' => 'Stwierdzono',
        'occurred_at' => 'Wystąpił',
        'notice_due_at' => 'Zgłosić do',
        'data_categories' => 'Informacje, których dotyczy',
        'affected_persons' => 'Osoby, których dotyczy',
        'sensitivity' => 'Wrażliwość informacji',
        'consequences' => 'Przewidywane skutki ich wykorzystania',
        'likelihood' => 'Prawdopodobieństwo szkodliwego wykorzystania',
        'measures' => 'Podjęte środki',
        'cai' => 'CAI',
        'persons' => 'Osoby',
        'cai_notified_at' => 'CAI powiadomiona',
        'cai_reference' => 'Sygnatura CAI',
        'persons_notified_at' => 'Osoby powiadomione',
        'persons_notice_delay_reason' => 'Dlaczego powiadomienie osób jest wstrzymane',
        'public_notice_at' => 'Ogłoszenie publiczne',
        'public_notice_reason' => 'Dlaczego ogłoszenie publiczne',
        'notified_at' => 'Powiadomiono',
        'keep_until' => 'Przechowywać w rejestrze do',
        'closed_at' => 'Zamknięto',
    ],

    'help' => [
        'discovered_at' => 'Kiedy dowiedziałeś się o incydencie. Docelowy termin powiadomienia liczy się od tej chwili i nie można go później zmienić.',
    ],

    'risk' => [
        'pending' => 'W ocenie',
        'not_serious' => 'Brak ryzyka poważnej szkody',
        'serious' => 'Ryzyko poważnej szkody',
    ],

    'status' => [
        'open' => 'Otwarty',
        'pending' => 'Powiadomienie oczekuje',
        'overdue' => 'Po terminie',
        'closed' => 'Zamknięty',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Oceń ryzyko',
            'description' => 'Oceń wrażliwość informacji, przewidywane skutki ich wykorzystania i prawdopodobieństwo wykorzystania ich w szkodliwych celach (art. 3.7). Skonsultuj się z osobą odpowiedzialną za ochronę informacji osobowych. Ryzyko poważnej szkody należy niezwłocznie zgłosić CAI i osobom, których dotyczy (art. 3.5).',
            'success' => 'Ryzyko ocenione.',
        ],
        'notify_cai' => [
            'label' => 'CAI powiadomiona',
            'success' => 'Zapisano powiadomienie CAI.',
        ],
        'notify_persons' => [
            'label' => 'Osoby powiadomione',
            'success' => 'Zapisano powiadomienie osób.',
        ],
        'notify_publicly' => [
            'label' => 'Ogłoszenie publiczne',
            'description' => 'Zamiast powiadomień indywidualnych, gdy powiadomienie każdej osoby byłoby nadmiernie uciążliwe, brakuje danych kontaktowych lub czas jest krótki (art. 5 rozporządzenia).',
            'success' => 'Zapisano ogłoszenie publiczne.',
        ],
        'defer' => [
            'label' => 'Wstrzymaj powiadomienie osób',
            'description' => 'Tylko dopóki powiadomienie osób mogłoby utrudnić dochodzenie (art. 3.5).',
            'success' => 'Zapisano powód.',
        ],
        'close' => [
            'label' => 'Zamknij',
            'success' => 'Incydent zamknięty.',
        ],
    ],
];
