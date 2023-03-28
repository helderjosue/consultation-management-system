<aside class="main-sidebar">

    <section class="sidebar">



		<?= dmstr\widgets\Menu::widget(
			[
				'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
				'items' => [
					['label' => 'Menu', 'options' => ['class' => 'header']],
					['label' => 'Visão Geral', 'icon' => 'dashboard', 'url' => ['/site/index']],
					['label' => 'Pacientes', 'icon' => 'far fa-users', 'url' => ['/paciente/index']],
					['label' => 'Consultas', 'icon' => 'far fa-file', 'url' => ['/consulta/index']],
					['label' => 'Medicos', 'icon' => 'far fa-users', 'url' => ['/medico/index']],
					['label' => 'Áreas', 'icon' => 'fas fa-sitemap', 'url' => ['/area/index']],
					['label' => 'Tipos', 'icon' => 'fas fa-sitemap', 'url' => ['/tipo/index']],

					['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
					[
						'label' => 'Definições',
						'icon' => 'settings',
						'url' => '#',
						'items' => [
                            ['label' => 'Usuarios', 'icon' => 'file-code-o', 'url' => ['/user/index']],

						],
					],
				],
			]
		) ?>

    </section>

</aside>





