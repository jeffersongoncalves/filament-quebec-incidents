<?php

return [
    'resource' => [
        'label' => 'Incidente de confidencialidad',
        'plural_label' => 'Incidentes de confidencialidad',
    ],

    'fields' => [
        'title' => 'Título',
        'description' => 'Descripción',
        'circumstances' => 'Circunstancias',
        'status' => 'Estado',
        'risk' => 'Riesgo de perjuicio grave',
        'discovered_at' => 'Conocimiento el',
        'occurred_at' => 'Ocurrido el',
        'notice_due_at' => 'Notificar antes de',
        'data_categories' => 'Información afectada',
        'affected_persons' => 'Personas afectadas',
        'sensitivity' => 'Sensibilidad de la información',
        'consequences' => 'Consecuencias previstas de su uso',
        'likelihood' => 'Probabilidad de uso perjudicial',
        'measures' => 'Medidas adoptadas',
        'cai' => 'CAI',
        'persons' => 'Personas',
        'cai_notified_at' => 'CAI notificada el',
        'cai_reference' => 'Referencia de la CAI',
        'persons_notified_at' => 'Personas notificadas el',
        'persons_notice_delay_reason' => 'Por qué se aplaza el aviso a las personas',
        'public_notice_at' => 'Aviso público el',
        'public_notice_reason' => 'Por qué un aviso público',
        'notified_at' => 'Comunicado el',
        'keep_until' => 'Conservar en el registro hasta',
        'closed_at' => 'Cerrado el',
    ],

    'help' => [
        'discovered_at' => 'Cuándo tuvo conocimiento del incidente. Su plazo objetivo de aviso empieza aquí y no se puede cambiar después.',
    ],

    'risk' => [
        'pending' => 'En evaluación',
        'not_serious' => 'Sin riesgo de perjuicio grave',
        'serious' => 'Riesgo de perjuicio grave',
    ],

    'status' => [
        'open' => 'Abierto',
        'pending' => 'Aviso pendiente',
        'overdue' => 'Vencido',
        'closed' => 'Cerrado',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Evaluar riesgo',
            'description' => 'Valore la sensibilidad de la información, las consecuencias previstas de su uso y la probabilidad de que se use con fines perjudiciales (art. 3.7). Consulte al responsable de la protección de la información personal. Un riesgo de perjuicio grave debe notificarse con prontitud a la CAI y a las personas afectadas (art. 3.5).',
            'success' => 'Riesgo evaluado.',
        ],
        'notify_cai' => [
            'label' => 'CAI notificada',
            'success' => 'Aviso a la CAI registrado.',
        ],
        'notify_persons' => [
            'label' => 'Personas notificadas',
            'success' => 'Aviso a las personas registrado.',
        ],
        'notify_publicly' => [
            'label' => 'Aviso público',
            'description' => 'En lugar de avisos individuales, cuando notificar a cada persona supondría una carga excesiva, faltan sus datos de contacto o el tiempo es escaso (art. 5 del reglamento).',
            'success' => 'Aviso público registrado.',
        ],
        'defer' => [
            'label' => 'Aplazar el aviso a las personas',
            'description' => 'Solo mientras notificar a las personas pueda obstaculizar una investigación (art. 3.5).',
            'success' => 'Motivo registrado.',
        ],
        'close' => [
            'label' => 'Cerrar',
            'success' => 'Incidente cerrado.',
        ],
    ],
];
