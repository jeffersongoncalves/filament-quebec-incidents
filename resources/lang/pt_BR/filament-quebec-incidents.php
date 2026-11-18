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
        'status' => 'Situação',
        'risk' => 'Risco de dano grave',
        'discovered_at' => 'Tomou conhecimento em',
        'occurred_at' => 'Ocorrido em',
        'notice_due_at' => 'Notificar até',
        'data_categories' => 'Informações envolvidas',
        'affected_persons' => 'Pessoas envolvidas',
        'sensitivity' => 'Sensibilidade das informações',
        'consequences' => 'Consequências previstas do seu uso',
        'likelihood' => 'Probabilidade de uso prejudicial',
        'measures' => 'Medidas tomadas',
        'cai' => 'CAI',
        'persons' => 'Pessoas',
        'cai_notified_at' => 'CAI notificada em',
        'cai_reference' => 'Referência da CAI',
        'persons_notified_at' => 'Pessoas notificadas em',
        'persons_notice_delay_reason' => 'Por que o aviso às pessoas aguarda',
        'public_notice_at' => 'Aviso público em',
        'public_notice_reason' => 'Por que um aviso público',
        'notified_at' => 'Comunicado em',
        'keep_until' => 'Manter no registro até',
        'closed_at' => 'Encerrado em',
    ],

    'help' => [
        'discovered_at' => 'Quando você tomou conhecimento do incidente. Seu prazo-alvo de notificação começa aqui e não pode ser alterado depois.',
    ],

    'risk' => [
        'pending' => 'Em avaliação',
        'not_serious' => 'Sem risco de dano grave',
        'serious' => 'Risco de dano grave',
    ],

    'status' => [
        'open' => 'Aberto',
        'pending' => 'Notificação pendente',
        'overdue' => 'Vencido',
        'closed' => 'Encerrado',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Avaliar risco',
            'description' => 'Pondere a sensibilidade das informações, as consequências previstas do seu uso e a probabilidade de serem usadas para fins prejudiciais (art. 3.7). Consulte o responsável pela proteção das informações pessoais. Um risco de dano grave deve ser notificado prontamente à CAI e às pessoas envolvidas (art. 3.5).',
            'success' => 'Risco avaliado.',
        ],
        'notify_cai' => [
            'label' => 'CAI notificada',
            'success' => 'Notificação à CAI registrada.',
        ],
        'notify_persons' => [
            'label' => 'Pessoas notificadas',
            'success' => 'Notificação às pessoas registrada.',
        ],
        'notify_publicly' => [
            'label' => 'Aviso público',
            'description' => 'Em vez de avisos individuais, quando notificar cada pessoa causaria dificuldade excessiva, faltarem os dados de contato ou o tempo for curto (art. 5 do regulamento).',
            'success' => 'Aviso público registrado.',
        ],
        'defer' => [
            'label' => 'Adiar o aviso às pessoas',
            'description' => 'Somente enquanto notificar as pessoas puder prejudicar uma investigação (art. 3.5).',
            'success' => 'Motivo registrado.',
        ],
        'close' => [
            'label' => 'Encerrar',
            'success' => 'Incidente encerrado.',
        ],
    ],
];
