<?php

return [
    'resource' => [
        'label' => 'Incident de confidentialité',
        'plural_label' => 'Incidents de confidentialité',
    ],

    'fields' => [
        'title' => 'Titre',
        'description' => 'Description',
        'circumstances' => 'Circonstances',
        'status' => 'Statut',
        'risk' => 'Risque de préjudice sérieux',
        'discovered_at' => 'Connaissance le',
        'occurred_at' => 'Survenu le',
        'notice_due_at' => 'Aviser avant le',
        'data_categories' => 'Renseignements concernés',
        'affected_persons' => 'Personnes concernées',
        'sensitivity' => 'Sensibilité des renseignements',
        'consequences' => 'Conséquences appréhendées de leur utilisation',
        'likelihood' => 'Probabilité d\'utilisation à des fins préjudiciables',
        'measures' => 'Mesures prises',
        'cai' => 'CAI',
        'persons' => 'Personnes',
        'cai_notified_at' => 'CAI avisée le',
        'cai_reference' => 'Référence de la CAI',
        'persons_notified_at' => 'Personnes avisées le',
        'persons_notice_delay_reason' => 'Pourquoi l\'avis aux personnes est différé',
        'public_notice_at' => 'Avis public le',
        'public_notice_reason' => 'Pourquoi un avis public',
        'notified_at' => 'Notifié le',
        'keep_until' => 'Conserver au registre jusqu\'au',
        'closed_at' => 'Clôturé le',
    ],

    'help' => [
        'discovered_at' => 'Quand vous avez pris connaissance de l\'incident. Votre délai cible d\'avis commence ici et ne peut pas être modifié ensuite.',
    ],

    'risk' => [
        'pending' => 'En évaluation',
        'not_serious' => 'Aucun risque de préjudice sérieux',
        'serious' => 'Risque de préjudice sérieux',
    ],

    'status' => [
        'open' => 'Ouvert',
        'pending' => 'Avis en attente',
        'overdue' => 'En retard',
        'closed' => 'Clôturé',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Évaluer le risque',
            'description' => 'Évaluez la sensibilité des renseignements, les conséquences appréhendées de leur utilisation et la probabilité qu\'ils soient utilisés à des fins préjudiciables (art. 3.7). Consultez la personne responsable de la protection des renseignements personnels. Un risque de préjudice sérieux doit être avisé avec diligence à la CAI et aux personnes concernées (art. 3.5).',
            'success' => 'Risque évalué.',
        ],
        'notify_cai' => [
            'label' => 'CAI avisée',
            'success' => 'Avis à la CAI consigné.',
        ],
        'notify_persons' => [
            'label' => 'Personnes avisées',
            'success' => 'Avis aux personnes consigné.',
        ],
        'notify_publicly' => [
            'label' => 'Avis public',
            'description' => 'Au lieu d\'avis individuels, lorsque aviser chaque personne causerait un préjudice excessif, que leurs coordonnées manquent ou que le temps presse (art. 5 du règlement).',
            'success' => 'Avis public consigné.',
        ],
        'defer' => [
            'label' => 'Différer l\'avis aux personnes',
            'description' => 'Seulement tant qu\'aviser les personnes pourrait entraver une enquête (art. 3.5).',
            'success' => 'Motif consigné.',
        ],
        'close' => [
            'label' => 'Clôturer',
            'success' => 'Incident clos.',
        ],
    ],
];
