<?php

class Af_news
{
    protected $_nbnews;
    protected $_langnews;
    protected $_universnews;

    protected $_nb_select = array(3, 5, 10, 15);

    protected $_urls_select = array(
        'fr' => array(
            'all' => 'http://fr.audiofanzine.com/news/a.rss.xml',
            'homestudio' => 'http://fr.audiofanzine.com/homestudio/news/a.rss.xml',
            'casque' => 'http://fr.audiofanzine.com/casque/news/a.rss.xml',
            'guitare' => 'http://fr.audiofanzine.com/guitare/news/a.rss.xml',
            'mao' => 'http://fr.audiofanzine.com/mao/news/a.rss.xml',
            'batterie' => 'http://fr.audiofanzine.com/batterie/news/a.rss.xml',
            'synthetiseur' => 'http://fr.audiofanzine.com/synthetiseur/news/a.rss.xml',
            'basse' => 'http://fr.audiofanzine.com/basse/news/a.rss.xml',
            'sono' => 'http://fr.audiofanzine.com/sono/news/a.rss.xml',
            'light' => 'http://fr.audiofanzine.com/light/news/a.rss.xml'
        ),
        'en' => array(
            'all' => 'http://en.audiofanzine.com/news/a.rss.xml',
            'homestudio' => 'http://en.audiofanzine.com/homestudio/news/a.rss.xml',
            'casque' => 'http://en.audiofanzine.com/headphone/news/a.rss.xml',
            'guitare' => 'http://en.audiofanzine.com/guitar/news/a.rss.xml',
            'mao' => 'http://en.audiofanzine.com/computer-music/news/a.rss.xml',
            'batterie' => 'http://en.audiofanzine.com/drum/news/a.rss.xml',
            'synthetiseur' => 'http://en.audiofanzine.com/electronic-instrument/news/a.rss.xml',
            'basse' => 'http://en.audiofanzine.com/bass/news/a.rss.xml',
            'sono' => 'http://en.audiofanzine.com/live-sound/news/a.rss.xml',
            'light' => 'http://en.audiofanzine.com/lighting/news/a.rss.xml'
        ),
        'de' => array(
            'all' => 'http://de.audiofanzine.com/news/a.rss.xml',
            'homestudio' => 'http://de.audiofanzine.com/studio-heimstudio/news/a.rss.xml',
            'casque' => 'http://de.audiofanzine.com/kopfhorer/news/a.rss.xml',
            'guitare' => 'http://de.audiofanzine.com/gitarre/news/a.rss.xml',
            'mao' => 'http://de.audiofanzine.com/musik-mit-computern/news/a.rss.xml',
            'batterie' => 'http://de.audiofanzine.com/schlagzeug-perkussion/news/a.rss.xml',
            'synthetiseur' => 'http://de.audiofanzine.com/elektronisches-instrument/news/a.rss.xml',
            'basse' => 'http://de.audiofanzine.com/bass/news/a.rss.xml',
            'sono' => 'http://de.audiofanzine.com/pa-live-sound/news/a.rss.xml',
            'light' => 'http://de.audiofanzine.com/licht/news/a.rss.xml'
        ),
        'es' => array(
            'all' => 'http://es.audiofanzine.com/noticias/a.rss.xml',
            'homestudio' => 'http://es.audiofanzine.com/estudio-home-studio/noticias/a.rss.xml',
            'casque' => 'http://es.audiofanzine.com/auriculares/noticias/a.rss.xml',
            'guitare' => 'http://es.audiofanzine.com/guitarra/noticias/a.rss.xml',
            'mao' => 'http://es.audiofanzine.com/informatica-musical/noticias/a.rss.xml',
            'batterie' => 'http://es.audiofanzine.com/bateria-percusion/noticias/a.rss.xml',
            'synthetiseur' => 'http://es.audiofanzine.com/instrumento-electronico/noticias/a.rss.xml',
            'basse' => 'http://es.audiofanzine.com/bajo/noticias/a.rss.xml',
            'sono' => 'http://es.audiofanzine.com/sonorizacion/noticias/a.rss.xml',
            'light' => 'http://es.audiofanzine.com/iluminacion/noticias/a.rss.xml'
        ),
        'it' => array(
            'all' => 'http://it.audiofanzine.com/news/a.rss.xml',
            'homestudio' => 'http://it.audiofanzine.com/studio-home-studio/news/a.rss.xml',
            'casque' => 'http://it.audiofanzine.com/cuffie/news/a.rss.xml',
            'guitare' => 'http://it.audiofanzine.com/chitarra/news/a.rss.xml',
            'mao' => 'http://it.audiofanzine.com/informatica-musicale/news/a.rss.xml',
            'batterie' => 'http://it.audiofanzine.com/batteria-percussione/news/a.rss.xml',
            'synthetiseur' => 'http://it.audiofanzine.com/strumento-elettronico/news/a.rss.xml',
            'basse' => 'http://it.audiofanzine.com/basso/news/a.rss.xml',
            'sono' => 'http://it.audiofanzine.com/impianto-pa-e-live-sound/news/a.rss.xml',
            'light' => 'http://it.audiofanzine.com/luci-e-illuminazione/news/a.rss.xml'
        ),
        'ja' => array(
            'all' => 'http://ja.audiofanzine.com/news/a.rss.xml',
            'homestudio' => 'http://ja.audiofanzine.com/homestudio/news/a.rss.xml',
            'casque' => 'http://ja.audiofanzine.com/headphone/news/a.rss.xml',
            'guitare' => 'http://ja.audiofanzine.com/guitar/news/a.rss.xml',
            'mao' => 'http://ja.audiofanzine.com/computer-music/news/a.rss.xml',
            'batterie' => 'http://ja.audiofanzine.com/drum/news/a.rss.xml',
            'synthetiseur' => 'http://ja.audiofanzine.com/electronic-instrument/news/a.rss.xml',
            'basse' => 'http://ja.audiofanzine.com/bass/news/a.rss.xml',
            'sono' => 'http://ja.audiofanzine.com/live-sound/news/a.rss.xml',
            'light' => 'http://ja.audiofanzine.com/lighting/news/a.rss.xml'
        ),
    );

    /**
     * Constructor
     * @param integer $nbnews
     * @param string $langnews
     * @param string $universnews
     */
    public function __construct($nbnews, $langnews, $universnews)
    {
        if($nbnews != null && $langnews != null)
        {
            $this->set_nbnews($nbnews);
            $this->set_langnews($langnews);
            $this->set_universnews($universnews);
        }
    }

    /**
     * Edit $_nbnews private var
     * @param integer $value
     */
    public function set_nbnews($nb)
    {
        $this->_nbnews = $nb;
    }

    /**
     * Edit $_langnews private var
     * @param string $value
     */
    public function set_langnews($lang)
    {
        $this->_langnews = $lang;
    }

    /**
     * Edit $_universnews private var
     * @param string $value
     */
    public function set_universnews($univers)
    {
        $this->_universnews = $univers;
    }

    /**
     * Generate AF RSS url
     * @param integer $nbnews
     * @param string $langnews
     * @param string $universnews
     * @return string
     */
    public function url_generator($nbnews, $langnews, $universnews)
    {
        // Check if number of news exists in array or set default to 3
        if(!isset($nbnews, $this->_nb_select))
        {
            $nbnews = 3;
        }

        // Check if news language exists in array, or set default to 'fr'
        if(!isset($this->_urls_select[$langnews]))
        {
            $langnews = 'fr';
        }

        // Check if news language exists in array or set default to 'all'
        if(!isset($this->_urls_select[$langnews][$universnews]))
        {
            $universnews = 'all';
        }

        // Generate url
        $generated_url = $this->_urls_select[$langnews][$universnews].'?limit='.$nbnews;

        return $generated_url;
    }

    /**
     * Get news from url with Wordpress's function "fetch_feed"
     * @return array
     */
    public function get_news()
    {
        // Generate url
        $url = $this->url_generator($this->_nbnews, $this->_langnews, $this->_universnews);

        // Include Wordpress file for "fetch_feed" function
        // and create array with feeds
        include_once( ABSPATH . WPINC . '/feed.php' );
        $rss = fetch_feed($url);

        // Check for errors
        if(!is_wp_error($rss)) :

            // Get total number of items, and limit to max;
            $maxitems = $rss->get_item_quantity($this->_nbnews);

            // Build an array of all the items;
            $news_item = $rss->get_items(0, $maxitems);

        endif;

        return $news_item;
        }
    }