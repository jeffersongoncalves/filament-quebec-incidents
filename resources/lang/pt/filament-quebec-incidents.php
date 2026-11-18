<?php

return [
    'resource' => [
        'label' => 'Incidente de confidencialidade',
        'plural_label' => 'Incidentes de confidencialidade',
    ],

    'fields' => [
        'title' => 'Título',
        'description' => 'Descrição',
        'circumstances' => 'Circunstâncias',
        'status' => 'Estado',
        'risk' => 'Risco de prejuízo grave',
        'discovered_at' => 'Conhecimento em',
        'occurred_at' => 'Ocorrido em',
        'notice_due_at' => 'Notificar até',
        'data_categories' => 'Informações em causa',
        'affected_persons' => 'Pessoas em causa',
        'sensitivity' => 'Sensibilidade das informações',
        'consequences' => 'Consequências previstas da sua utilização',
        'likelihood' => 'Probabilidade de utilização prejudicial',
        'measures' => 'Medidas tomadas',
        'cai' => 'CAI',
        'persons' => 'Pessoas',
        'cai_notified_at' => 'CAI notificada em',
        'cai_reference' => 'Referência da CAI',
        'persons_notified_at' => 'Pessoas notificadas em',
        'persons_notice_delay_reason' => 'Porque o aviso às pessoas aguarda',
        'public_notice_at' => 'Aviso público em',
        'public_notice_reason' => 'Porquê um aviso público',
        'notified_at' => 'Comunicado em',
        'keep_until' => 'Manter no registo até',
        'closed_at' => 'Encerrado em',
    ],

    'help' => [
        'discovered_at' => 'Quando tomou conhecimento do incidente. O seu prazo-alvo de notificação começa aqui e não pode ser alterado depois.',
    ],

    'risk' => [
        'pending' => 'Em avaliação',
        'not_serious' => 'Sem risco de prejuízo grave',
        'serious' => 'Risco de prejuízo grave',
    ],

    'status' => [
        'open' => 'Aberto',
        'pending' => 'Notificação pendente',
        'overdue' => 'Em atraso',
        'closed' => 'Encerrado',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Avaliar risco',
            'description' => 'Pondere a sensibilidade das informações, as consequências previstas da sua utilização e a probabilidade de serem utilizadas para fins prejudiciais (art. 3.7). Consulte o responsável pela proteção das informações pessoais. Um risco de prejuízo grave deve ser notificado prontamente à CAI e às pessoas em causa (art. 3.5).',
            'success' => 'Risco avaliado.',
        ],
        'notify_cai' => [
            'label' => 'CAI notificada',
            'success' => 'Notificação à CAI registada.',
        ],
        'notify_persons' => [
            'label' => 'Pessoas notificadas',
            'success' => 'Notificação às pessoas registada.',
        ],
        'notify_publicly' => [
            'label' => 'Aviso público',
            'description' => 'Em vez de avisos individuais, quando notificar cada pessoa causaria dificuldade excessiva, faltam os contactos ou o tempo é curto (art. 5 do regulamento).',
            'success' => 'Aviso público registado.',
        ],
        'defer' => [
            'label' => 'Adiar o aviso às pessoas',
            'description' => 'Apenas enquanto notificar as pessoas puder prejudicar uma investigação (art. 3.5).',
            'success' => 'Motivo registado.',
        ],
        'close' => [
            'label' => 'Encerrar',
            'success' => 'Incidente encerrado.',
        ],
    ],
];
