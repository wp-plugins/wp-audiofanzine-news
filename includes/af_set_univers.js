// Select element traduction
// FR
var univers_fr = new Array(9);
univers_fr['all'] = 'Toutes les news';
univers_fr['homestudio'] = 'Studio / Homestudio',
univers_fr['casque'] = 'Casques',
univers_fr['guitare'] = 'Guitare',
univers_fr['mao'] = 'Informatique musicale / MAO',
univers_fr['batterie'] = 'Batterie / percussions',
univers_fr['synthetiseur'] = 'Instruments électroniques',
univers_fr['basse'] = 'Basse',
univers_fr['sono'] = 'Sono',
univers_fr['light'] = 'Éclairage';
// EN
var univers_en = new Array(9);
univers_en['all'] = 'All news';
univers_en['homestudio'] = 'Studio & Home Studio',
univers_en['casque'] = 'Headphones',
univers_en['guitare'] = 'Guitar',
univers_en['mao'] = 'Music with Computers',
univers_en['batterie'] = 'Drums & Percussion',
univers_en['synthetiseur'] = 'Electronic instruments',
univers_en['basse'] = 'Bass',
univers_en['sono'] = 'PA & Live Sound',
univers_en['light'] = 'Lighting';
// DE
var univers_de = new Array(9);
univers_de['all'] = 'Alle News Artikel';
univers_de['homestudio'] = 'Studio & Heimstudio',
univers_de['casque'] = 'Kopfhörer',
univers_de['guitare'] = 'Gitarren',
univers_de['mao'] = 'Musik mit Computern',
univers_de['batterie'] = 'Schlagzeug & Perkussion',
univers_de['synthetiseur'] = 'Elektronische Instrumente',
univers_de['basse'] = 'Bässe',
univers_de['sono'] = 'PA & Live Sound',
univers_de['light'] = 'Licht';
// ES
var univers_es = new Array(9);
univers_es['all'] = 'Todas las noticias';
univers_es['homestudio'] = 'Estudio & Home Studio',
univers_es['casque'] = 'Auriculares',
univers_es['guitare'] = 'Guitarras',
univers_es['mao'] = 'Informática Musical',
univers_es['batterie'] = 'Baterías & Percusiones',
univers_es['synthetiseur'] = 'Instrumentos Electrónicos',
univers_es['basse'] = 'Bajos',
univers_es['sono'] = 'Sonorización',
univers_es['light'] = 'Iluminación';
// IT
var univers_it = new Array(9);
univers_it['all'] = 'Guarda tutte le news';
univers_it['homestudio'] = 'Studio & Home Studio',
univers_it['casque'] = 'Cuffie',
univers_it['guitare'] = 'Chitarre',
univers_it['mao'] = 'Informatica Musicale',
univers_it['batterie'] = 'Batterie/Percussioni',
univers_it['synthetiseur'] = 'Strumenti Elettronici',
univers_it['basse'] = 'Bassi',
univers_it['sono'] = 'Impianti PA e Live Sound',
 univers_it['light'] = 'Luci e Illuminazioni';
// JA
var univers_ja = new Array(9);
univers_ja['all'] = 'すべてのニュースを見る';
univers_ja['homestudio'] = 'スタジオ＆ホームスタジオ',
univers_ja['casque'] = 'ヘッドフォン',
univers_ja['guitare'] = 'ギター',
univers_ja['mao'] = 'DTM/DAW',
univers_ja['batterie'] = 'ドラム＆パーカッション',
univers_ja['synthetiseur'] = '電子楽器',
univers_ja['basse'] = 'ベース',
univers_ja['sono'] = 'PA ＆ライブサウンド',
univers_ja['light'] = '照明';

// Change univers language when new language is chosen
function set_univers(sel)
{
    var lang = sel.value;
    var sel_id = sel.id;
    // Select array for the good language
    if(lang == 'fr')
    {
        univers_array = univers_fr;
    }
    else if(lang == 'en')
    {
        univers_array = univers_en;
    }
    else if(lang == 'de')
    {
        univers_array = univers_de;
    }
    else if(lang == 'es')
    {
        univers_array = univers_es;
    }
    else if(lang == 'it')
    {
        univers_array = univers_it;
    }
    else if(lang == 'ja')
    {
        univers_array = univers_ja;
    }
    else
    {
        univers_array = univers_en;
    }

    // Change options text
    document.getElementsByClassName(sel_id+' all')[0].text=univers_array['all'];
    document.getElementsByClassName(sel_id+' homestudio')[0].text=univers_array['homestudio'];
    document.getElementsByClassName(sel_id+' casque')[0].text=univers_array['casque'];
    document.getElementsByClassName(sel_id+' guitare')[0].text=univers_array['guitare'];
    document.getElementsByClassName(sel_id+' mao')[0].text=univers_array['mao'];
    document.getElementsByClassName(sel_id+' batterie')[0].text=univers_array['batterie'];
    document.getElementsByClassName(sel_id+' synthetiseur')[0].text=univers_array['synthetiseur'];
    document.getElementsByClassName(sel_id+' basse')[0].text=univers_array['basse'];
    document.getElementsByClassName(sel_id+' sono')[0].text=univers_array['sono'];
    document.getElementsByClassName(sel_id+' light')[0].text=univers_array['light'];
}
            
// Change language when plugin's button is submited
window.onload = function()
{
    var selects = document.getElementsByClassName('wpafnews_langnews');
    for(var i in selects)
    {
        set_univers(selects[i]);
    }
};