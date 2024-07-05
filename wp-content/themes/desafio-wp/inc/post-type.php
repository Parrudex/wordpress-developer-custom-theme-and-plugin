<?php defined('ABSPATH') || exit;

class BX_Play_Post_Type
{
    public static function init()
    {
        add_action('init', array(__CLASS__, 'register_post_types'), 5);
        add_action('init', array(__CLASS__, 'register_taxonomies'), 5);

        register_activation_hook(__FILE__, 'rewrite_flush');
    }

    public static function register_post_types()
    {
        if (!is_blog_installed() || post_type_exists('video')) {
            return;
        }

	    register_post_type(
		    'video',
		    array(
			    'labels'              => array(
				    'name'                  => 'Vídeos',
				    'singular_name'         => 'Vídeo',
				    'all_items'             => 'Todos Vídeos',
				    'menu_name'             => 'Vídeos',
				    'add_new'               => 'Adicionar novo vídeo',
				    'add_new_item'          => 'Adicionar novo vídeo',
				    'edit'                  => 'Editar',
				    'edit_item'             => 'Editar Vídeo',
				    'new_item'              => 'Novo Vídeo',
				    'view_item'             => 'Ver Vídeo',
				    'view_items'            => 'Ver Vídeos',
				    'search_items'          => 'Pesquisar Vídeos',
				    'not_found'             => 'Nenhum Vídeo encontrado',
				    'not_found_in_trash'    => 'Nenhum Vídeo encontrado na lixeira',
				    'parent'                => 'Vídeo Pai',
				    'insert_into_item'      => 'Inserir no Vídeo',
				    'filter_items_list'     => 'Filtrar Vídeos',
				    'items_list_navigation' => 'Navegação dos Vídeos',
				    'items_list'            => 'Lista dos Vídeos',
			    ),
			    'description'         => 'Aqui é onde você consegue adicionar novos Vídeos ao sistema.',
			    'public'              => true,
			    'show_ui'             => true,
			    'show_admin_column'   => true,
			    'capability_type'     => 'post',
			    'map_meta_cap'        => true,
			    'publicly_queryable'  => true,
			    'exclude_from_search' => false,
			    'hierarchical'        => false,
			    'query_var'           => true,
			    'supports'            => array('title', 'editor', 'custom-fields', 'thumbnail'),
			    'has_archive'         => true,
			    'show_in_nav_menus'   => true,
			    'show_in_rest'        => true,
			    'menu_position'       => 5,
		    )
	    );
    }

	public static function register_taxonomies()
	{
        if (!is_blog_installed() || taxonomy_exists('video_type')) {
            return;
        }

		register_taxonomy('video_type',
			array('video'),
			array(
				'labels' => array(
					'name'              => 'Tipos',
					'singular_name'     => 'Tipo',
					'menu_name'         => 'Tipos',
					'search_items'      => 'Pesquisar Tipos',
					'all_items'         => 'Todos Tipos',
					'parent_item'       => 'Tipo Pai',
					'parent_item_colon' => 'Tipo Pai:',
					'edit_item'         => 'Editar Tipo',
					'update_item'       => 'Atualizar Tipo',
					'add_new_item'      => 'Adicionar novo tipo',
					'new_item_name'     => 'Novo Tipo Nome',
					'not_found'         => 'Nenhum tipo encontrado',
				),
				'public'            => true,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
			)
		);
	}
}

BX_Play_Post_Type::init();