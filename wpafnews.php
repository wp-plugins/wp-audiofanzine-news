<?php
/*
Plugin Name: WP Audiofanzine News
Plugin URI: http://www.audiofanzine.com
Description: Affiche les dernières news d'Audiofanzine dans votre sidebar.
Version: 1.0.1
Author: Bordas Media
Author URI: http://audiofanzine.com
*/

class Wpafnews extends WP_Widget
{
    protected $default_titlenews = array(
        'fr' => "Les news d'Audiofanzine",
        'en' => "Audiofanzine's News",
        'de' => "Die Nachricht von Audiofanzine",
        'es' => "Las noticias de Audiofanzine",
        'it' => "Notizie di Audiofanzine",
        'ja' => "Audiofanzineのニュース"
    );

    protected $default_nbnews = 5;

    protected $default_langnews = 'fr';

    protected $nb_select = array(3, 5, 10, 15);

    protected $lang_select = array(
        'fr' => 'Français',
        'en' => 'English',
        'de' => 'Deutsch',
        'es' => 'Español',
        'it' => 'Italian',
        'ja' => 'Japanese'
    );

    protected $univers_select = array(
        'all' => 'All news',
        'homestudio' => 'Studio & Home Studio',
        'casque' => 'Headphones',
        'guitare' => 'Guitar',
        'mao' => 'Music with Computers',
        'batterie' => 'Drums & Percussion',
        'synthetiseur' => 'Electronic instruments',
        'basse' => 'Bass',
        'sono' => 'PA & Live Sound',
        'light' => 'Lighting'
    );

    /**
     * Check if select option is selected and generate 'selected="selected"' tag
     * @param string $current
     * @param string $selected
     * @return string
     */
    private function current_selection($current, $selected)
    {
        if($current == $selected)
        {
            return 'selected="selected"';
        }
        else
        {
            return '';
        }
    }

    /**
     * Wordpress widget constructor
     */
    function Wpafnews()
    {
        parent::WP_Widget(
            false,
            $name = 'Audiofanzine News',
            array('description' => 'Affichage des dernières news d\'Audiofanzine via RSS')
        );
    }

    /**
     * [Wordpress method] controller for the view on frontend
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance)
    {
        // Necessary for WP
        extract($args);

        // Get values
        $nbnews = strip_tags($instance['nbnews']);
        $langnews = strip_tags($instance['langnews']);
        $universnews = strip_tags($instance['universnews']);

        // Get title or set default if null
        $titlenews = apply_filters('widget_title', $instance['titlenews']);
        if(!isset($titlenews) || empty($titlenews))
        {
            $titlenews = $this->default_titlenews[$langnews];
        }

        $titlenews = $before_title.$titlenews.$after_title;

        // Get news and view file
        require_once('includes/af_news.class.php');
        $news_items = new Af_news($nbnews, $langnews, $universnews);
        $news_items = $news_items->get_news();
        require('includes/af_view_widget.php');
    }

    /**
     * [Wordpress method] Use to update configuration on backend
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    function update($new_instance, $old_instance)
    {
        // Get old values
        $instance = $old_instance;
        // Edit with new values
        $instance['titlenews'] = strip_tags($new_instance['titlenews']);
        $instance['nbnews'] = strip_tags((int)$new_instance['nbnews']);
        $instance['langnews'] = strip_tags($new_instance['langnews']);
        $instance['universnews'] = strip_tags($new_instance['universnews']);
        //return values
        return $instance;
    }

    /**
     * [Wordpress method] Generate form on backend (in 'Appearance > Widgets')
     * @param array $instance
     */
    function form($instance)
    {
        // Get language or set default if null
        if(isset($instance['langnews']) && !empty($instance['langnews']))
        {
            $langnews = strip_tags($instance['langnews']);
        }
        else
        {
            // Get first two chars from string that looks like 'fr-FR'
            $langnews = substr(get_bloginfo('language'), 0, 2);
            // Set to default if traduction doesn't exist
            if($langnews != ('fr' || 'en' || 'de' || 'es' || 'it' || 'ja'))
            {
                $langnews = 'en';
            }
         }

        // Get title or set default if null
        if(isset($instance['titlenews']) && !empty($instance['titlenews']))
        {
            $titlenews = strip_tags($instance['titlenews']);
        }
        else
        {
            $titlenews = '';
        }

        // Get number or set default if null
        if(isset($instance['nbnews']) && !empty($instance['nbnews']))
        {
            $nbnews = strip_tags($instance['nbnews']);
        }
        else
        {
            $nbnews = 3;
        }

        // Get univers or set default if null
        if(isset($instance['universnews']) && !empty($instance['universnews']))
        {
            $universnews = strip_tags($instance['universnews']);
        }
        else
        {
            $universnews = 'all';
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('titlenews'); ?>">
                <?php _e('Title to display : ', 'wpafnews'); ?>
            </label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('titlenews'); ?>" name="<?php echo $this->get_field_name('titlenews'); ?>" value="<?php echo $titlenews; ?>" />
        </p>
        <p>
           <label for="<?php echo $this->get_field_id('nbnews'); ?>">
                <?php _e('Number of news', 'wpafnews'); ?>
            </label>
            <select id="<?php echo $this->get_field_id('nbnews'); ?>" name="<?php echo $this->get_field_name('nbnews'); ?>">
                <?php foreach($this->nb_select as $nb_key) : ?>
                    <option value="<?php echo $nb_key; ?>" <?php echo $this->current_selection($nb_key, $nbnews); ?>>
                        <?php echo $nb_key; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('langnews'); ?>">
                <?php _e('Language of the news', 'wpafnews'); ?>
            </label>
            <select class="wpafnews_langnews" id="<?php echo $this->get_field_id('langnews'); ?>" name="<?php echo $this->get_field_name('langnews'); ?>" onchange="set_univers(this);">
                <?php foreach($this->lang_select as $lang_key => $lang_value) : ?>
                     <option value="<?php echo $lang_key; ?>" <?php echo $this->current_selection($lang_key, $langnews); ?>>
                        <?php echo $lang_value; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('universnews'); ?>">
                <?php _e('Univers :', 'wpafnews'); ?>
            </label>
            <select class="widefat" id="<?php echo $this->get_field_id('universnews'); ?>" name="<?php echo $this->get_field_name('universnews'); ?>">
                <?php foreach($this->univers_select as $univers_key => $univers_value) : ?>
                    <option class="<?php echo $this->get_field_id('langnews'); ?> <?php echo $univers_key; ?>" value="<?php echo $univers_key; ?>" <?php echo $this->current_selection($univers_key, $universnews); ?>><?php echo $univers_value; ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <script type="text/javascript">
            // Change language when plugin's button is submited
            var select = document.getElementById('<?php echo $this->get_field_id('langnews'); ?>');
            set_univers(select);
        </script>

        <?php
    }
}

/**
 * Add '/includes/af_set_univers.js' to the enqueue scripts
 * @param string $hook
 */
function set_univers_function($hook)
    {
    if('widgets.php' != $hook)
    {
        return;
    }
    wp_enqueue_script('set_univers', plugins_url('/includes/af_set_univers.js', __FILE__), null, false, true);
}

add_action( 'admin_enqueue_scripts', 'set_univers_function' );

/**
 * [Wordpress function] Register Widget in 'Extentions'
 */
function wpafnews_init()
{
	register_widget('Wpafnews');
	// Load traduction files
	load_plugin_textdomain('wpafnews',false, dirname(plugin_basename( __FILE__ ) ) . '/lang/');
}

// Final line to register widget
add_action('widgets_init', 'wpafnews_init');