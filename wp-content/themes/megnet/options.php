<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'tl_back'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

        
        //Background Repeat        
        $bg_repeat = array(            
                'repeat'=>__('Repeat', 'tl_back'),
                'repeat-x'=>__('Repeat X', 'tl_back'),
                'repeat-y'=>__('Repeat Y', 'tl_back'),
                'no-repeat'=>__('No Repeat', 'tl_back')                
        );
        

        //Background Repeat        
        $bg_position = array(            
                'left top'=>__('left top', 'tl_back'),
                'left center'=>__('left center', 'tl_back'),
                'left bottom'=>__('left bottom', 'tl_back'),
                'right top'=>__('right top', 'tl_back'),
                'center top'=>__('center top', 'tl_back'),
                'center center'=>__('center center', 'tl_back'),
                'center bottom'=>__('center bottom', 'tl_back')
        );     


	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'Arial, sans-serif',
		'style' => 'normal',
		'color' => '#333333');
        
        $typography_google_defaults = array(
		'size' => '15px',
		'face' => 'Bree Serif',
		'style' => 'normal',
		'color' => '#333333');
        
        $os_font = array(
        'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma');
        
	$google_faces = array(
        'none' => 'None',
	'arial'     => 'Arial',
	'verdana'   => 'Verdana, Geneva',
	'trebuchet' => 'Trebuchet',
	'georgia'   => 'Georgia',
	'times'     => 'Times New Roman',
	'tahoma'    => 'Tahoma, Geneva',
	'helvetica' => 'Helvetica*',
	"Abel" => "Abel",
	"Abril Fatface" => "Abril Fatface",
	"Aclonica" => "Aclonica",
	"Acme" => "Acme",
	"Actor" => "Actor",
	"Adamina" => "Adamina",
	"Advent Pro" => "Advent Pro",
	"Aguafina Script" => "Aguafina Script",
	"Aladin" => "Aladin",
	"Aldrich" => "Aldrich",
	"Alegreya" => "Alegreya",
	"Alegreya SC" => "Alegreya SC",
	"Alex Brush" => "Alex Brush",
	"Alfa Slab One" => "Alfa Slab One",
	"Alice" => "Alice",
	"Alike" => "Alike",
	"Alike Angular" => "Alike Angular",
	"Allan" => "Allan",
	"Allerta" => "Allerta",
	"Allerta Stencil" => "Allerta Stencil",
	"Allura" => "Allura",
	"Almendra" => "Almendra",
	"Almendra SC" => "Almendra SC",
	"Amarante" => "Amarante",
	"Amaranth" => "Amaranth",
	"Amatic SC" => "Amatic SC",
	"Amethysta" => "Amethysta",
	"Andada" => "Andada",
	"Andika" => "Andika",
	"Angkor" => "Angkor",
	"Annie Use Your Telescope" => "Annie Use Your Telescope",
	"Anonymous Pro" => "Anonymous Pro",
	"Antic" => "Antic",
	"Antic Didone" => "Antic Didone",
	"Antic Slab" => "Antic Slab",
	"Anton" => "Anton",
	"Arapey" => "Arapey",
	"Arbutus" => "Arbutus",
	"Architects Daughter" => "Architects Daughter",
	"Arimo" => "Arimo",
	"Arizonia" => "Arizonia",
	"Armata" => "Armata",
	"Artifika" => "Artifika",
	"Arvo" => "Arvo",
	"Asap" => "Asap",
	"Asset" => "Asset",
	"Astloch" => "Astloch",
	"Asul" => "Asul",
	"Atomic Age" => "Atomic Age",
	"Aubrey" => "Aubrey",
	"Audiowide" => "Audiowide",
	"Average" => "Average",
	"Averia Gruesa Libre" => "Averia Gruesa Libre",
	"Averia Libre" => "Averia Libre",
	"Averia Sans Libre" => "Averia Sans Libre",
	"Averia Serif Libre" => "Averia Serif Libre",
	"Bad Script" => "Bad Script",
	"Balthazar" => "Balthazar",
	"Bangers" => "Bangers",
	"Basic" => "Basic",
	"Battambang" => "Battambang",
	"Baumans" => "Baumans",
	"Bayon" => "Bayon",
	"Belgrano" => "Belgrano",
	"Belleza" => "Belleza",
	"Bentham" => "Bentham",
	"Berkshire Swash" => "Berkshire Swash",
	"Bevan" => "Bevan",
	"Bigshot One" => "Bigshot One",
	"Bilbo" => "Bilbo",
	"Bilbo Swash Caps" => "Bilbo Swash Caps",
	"Bitter" => "Bitter",
	"Black Ops One" => "Black Ops One",
	"Bokor" => "Bokor",
	"Bonbon" => "Bonbon",
	"Boogaloo" => "Boogaloo",
	"Bowlby One" => "Bowlby One",
	"Bowlby One SC" => "Bowlby One SC",
	"Brawler" => "Brawler",
	"Bree Serif" => "Bree Serif",
	"Bubblegum Sans" => "Bubblegum Sans",
	"Bubbler One" => "Bubbler One",
	"Buda" => "Buda",
	"Buenard" => "Buenard",
	"Butcherman" => "Butcherman",
	"Butterfly Kids" => "Butterfly Kids",
	"Cabin" => "Cabin",
	"Cabin Condensed" => "Cabin Condensed",
	"Cabin Sketch" => "Cabin Sketch",
	"Caesar Dressing" => "Caesar Dressing",
	"Cagliostro" => "Cagliostro",
	"Calligraffitti" => "Calligraffitti",
	"Cambo" => "Cambo",
	"Candal" => "Candal",
	"Cantarell" => "Cantarell",
	"Cantata One" => "Cantata One",
	"Cantora One" => "Cantora One",
	"Capriola" => "Capriola",
	"Cardo" => "Cardo",
	"Carme" => "Carme",
	"Carter One" => "Carter One",
	"Caudex" => "Caudex",
	"Cedarville Cursive" => "Cedarville Cursive",
	"Ceviche One" => "Ceviche One",
	"Changa One" => "Changa One",
	"Chango" => "Chango",
	"Chau Philomene One" => "Chau Philomene One",
	"Chelsea Market" => "Chelsea Market",
	"Chenla" => "Chenla",
	"Cherry Cream Soda" => "Cherry Cream Soda",
	"Chewy" => "Chewy",
	"Chicle" => "Chicle",
	"Chivo" => "Chivo",
	"Coda" => "Coda",
	"Coda Caption" => "Coda Caption",
	"Codystar" => "Codystar",
	"Comfortaa" => "Comfortaa",
	"Coming Soon" => "Coming Soon",
	"Concert One" => "Concert One",
	"Condiment" => "Condiment",
	"Content" => "Content",
	"Contrail One" => "Contrail One",
	"Convergence" => "Convergence",
	"Cookie" => "Cookie",
	"Copse" => "Copse",
	"Corben" => "Corben",
	"Courgette" => "Courgette",
	"Cousine" => "Cousine",
	"Coustard" => "Coustard",
	"Covered By Your Grace" => "Covered By Your Grace",
	"Crafty Girls" => "Crafty Girls",
	"Creepster" => "Creepster",
	"Crete Round" => "Crete Round",
	"Crimson Text" => "Crimson Text",
	"Crushed" => "Crushed",
	"Cuprum" => "Cuprum",
	"Cutive" => "Cutive",
	"Damion" => "Damion",
	"Dancing Script" => "Dancing Script",
	"Dangrek" => "Dangrek",
	"Dawning of a New Day" => "Dawning of a New Day",
	"Days One" => "Days One",
	"Delius" => "Delius",
	"Delius Swash Caps" => "Delius Swash Caps",
	"Delius Unicase" => "Delius Unicase",
	"Della Respira" => "Della Respira",
	"Devonshire" => "Devonshire",
	"Didact Gothic" => "Didact Gothic",
	"Diplomata" => "Diplomata",
	"Diplomata SC" => "Diplomata SC",
	"Doppio One" => "Doppio One",
	"Dorsa" => "Dorsa",
	"Dosis" => "Dosis",
	"Dr Sugiyama" => "Dr Sugiyama",
	"Droid Sans" => "Droid Sans",
	"Droid Sans Mono" => "Droid Sans Mono",
	"Droid Serif" => "Droid Serif",
	"Duru Sans" => "Duru Sans",
	"Dynalight" => "Dynalight",
	"EB Garamond" => "EB Garamond",
	"Eagle Lake" => "Eagle Lake",
	"Eater" => "Eater",
	"Economica" => "Economica",
	"Electrolize" => "Electrolize",
	"Emblema One" => "Emblema One",
	"Emilys Candy" => "Emilys Candy",
	"Engagement" => "Engagement",
	"Enriqueta" => "Enriqueta",
	"Erica One" => "Erica One",
	"Esteban" => "Esteban",
	"Euphoria Script" => "Euphoria Script",
	"Ewert" => "Ewert",
	"Exo" => "Exo",
	"Expletus Sans" => "Expletus Sans",
	"Fjalla One" => "Fjalla One",
	"Fanwood Text" => "Fanwood Text",
	"Fascinate" => "Fascinate",
	"Fascinate Inline" => "Fascinate Inline",
	"Fasthand" => "Fasthand",
	"Federant" => "Federant",
	"Federo" => "Federo",
	"Felipa" => "Felipa",
	"Fjord One" => "Fjord One",
	"Flamenco" => "Flamenco",
	"Flavors" => "Flavors",
	"Fondamento" => "Fondamento",
	"Fontdiner Swanky" => "Fontdiner Swanky",
	"Forum" => "Forum",
	"Francois One" => "Francois One",
	"Fredericka the Great" => "Fredericka the Great",
	"Fredoka One" => "Fredoka One",
	"Freehand" => "Freehand",
	"Fresca" => "Fresca",
	"Frijole" => "Frijole",
	"Fugaz One" => "Fugaz One",
	"GFS Didot" => "GFS Didot",
	"GFS Neohellenic" => "GFS Neohellenic",
	"Galdeano" => "Galdeano",
	"Galindo" => "Galindo",
	"Gentium Basic" => "Gentium Basic",
	"Gentium Book Basic" => "Gentium Book Basic",
	"Geo" => "Geo",
	"Geostar" => "Geostar",
	"Geostar Fill" => "Geostar Fill",
	"Germania One" => "Germania One",
	"Give You Glory" => "Give You Glory",
	"Glass Antiqua" => "Glass Antiqua",
	"Glegoo" => "Glegoo",
	"Gloria Hallelujah" => "Gloria Hallelujah",
	"Goblin One" => "Goblin One",
	"Gochi Hand" => "Gochi Hand",
	"Gorditas" => "Gorditas",
	"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
	"Graduate" => "Graduate",
	"Gravitas One" => "Gravitas One",
	"Great Vibes" => "Great Vibes",
	"Griffy" => "Griffy",
	"Gruppo" => "Gruppo",
	"Gudea" => "Gudea",
	"Habibi" => "Habibi",
	"Hammersmith One" => "Hammersmith One",
	"Handlee" => "Handlee",
	"Hanuman" => "Hanuman",
	"Happy Monkey" => "Happy Monkey",
	"Headland One" => "Headland One",
	"Henny Penny" => "Henny Penny",
	"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
	"Holtwood One SC" => "Holtwood One SC",
	"Homemade Apple" => "Homemade Apple",
	"Homenaje" => "Homenaje",
	"IM Fell DW Pica" => "IM Fell DW Pica",
	"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
	"IM Fell Double Pica" => "IM Fell Double Pica",
	"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
	"IM Fell English" => "IM Fell English",
	"IM Fell English SC" => "IM Fell English SC",
	"IM Fell French Canon" => "IM Fell French Canon",
	"IM Fell French Canon SC" => "IM Fell French Canon SC",
	"IM Fell Great Primer" => "IM Fell Great Primer",
	"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
	"Iceberg" => "Iceberg",
	"Iceland" => "Iceland",
	"Imprima" => "Imprima",
	"Inconsolata" => "Inconsolata",
	"Inder" => "Inder",
	"Indie Flower" => "Indie Flower",
	"Inika" => "Inika",
	"Irish Grover" => "Irish Grover",
	"Istok Web" => "Istok Web",
	"Italiana" => "Italiana",
	"Italianno" => "Italianno",
	"Jacques Francois" => "Jacques Francois",
	"Jacques Francois Shadow" => "Jacques Francois Shadow",
	"Jim Nightshade" => "Jim Nightshade",
	"Jockey One" => "Jockey One",
	"Jolly Lodger" => "Jolly Lodger",
	"Josefin Sans" => "Josefin Sans",
	"Josefin Slab" => "Josefin Slab",
	"Judson" => "Judson",
	"Julee" => "Julee",
	"Junge" => "Junge",
	"Jura" => "Jura",
	"Just Another Hand" => "Just Another Hand",
	"Just Me Again Down Here" => "Just Me Again Down Here",
	"Kameron" => "Kameron",
	"Karla" => "Karla",
	"Kaushan Script" => "Kaushan Script",
	"Kelly Slab" => "Kelly Slab",
	"Kenia" => "Kenia",
	"Khmer" => "Khmer",
	"Knewave" => "Knewave",
	"Kotta One" => "Kotta One",
	"Koulen" => "Koulen",
	"Kranky" => "Kranky",
	"Kreon" => "Kreon",
	"Kristi" => "Kristi",
	"Krona One" => "Krona One",
	"La Belle Aurore" => "La Belle Aurore",
	"Lancelot" => "Lancelot",
	"Lato" => "Lato",
	"League Script" => "League Script",
	"Leckerli One" => "Leckerli One",
	"Ledger" => "Ledger",
	"Lekton" => "Lekton",
	"Lemon" => "Lemon",
	"Life Savers" => "Life Savers",
	"Lilita One" => "Lilita One",
	"Limelight" => "Limelight",
	"Linden Hill" => "Linden Hill",
	"Lobster" => "Lobster",
	"Lobster Two" => "Lobster Two",
	"Londrina Outline" => "Londrina Outline",
	"Londrina Shadow" => "Londrina Shadow",
	"Londrina Sketch" => "Londrina Sketch",
	"Londrina Solid" => "Londrina Solid",
	"Lora" => "Lora",
	"Love Ya Like A Sister" => "Love Ya Like A Sister",
	"Loved by the King" => "Loved by the King",
	"Lovers Quarrel" => "Lovers Quarrel",
	"Luckiest Guy" => "Luckiest Guy",
	"Lusitana" => "Lusitana",
	"Lustria" => "Lustria",
	"Monda" => "Monda",
	"Macondo" => "Macondo",
	"Macondo Swash Caps" => "Macondo Swash Caps",
	"Magra" => "Magra",
	"Maiden Orange" => "Maiden Orange",
	"Mako" => "Mako",
	"Marck Script" => "Marck Script",
	"Marko One" => "Marko One",
	"Marmelad" => "Marmelad",
	"Marvel" => "Marvel",
	"Mate" => "Mate",
	"Mate SC" => "Mate SC",
	"Maven Pro" => "Maven Pro",
	"McLaren" => "McLaren",
	"Meddon" => "Meddon",
	"MedievalSharp" => "MedievalSharp",
	"Medula One" => "Medula One",
	"Megrim" => "Megrim",
	"Meie Script" => "Meie Script",
	"Merienda One" => "Merienda One",
	"Merriweather" => "Merriweather",
	"Metal" => "Metal",
	"Metal Mania" => "Metal Mania",
	"Metamorphous" => "Metamorphous",
	"Metrophobic" => "Metrophobic",
	"Michroma" => "Michroma",
	"Miltonian" => "Miltonian",
	"Miltonian Tattoo" => "Miltonian Tattoo",
	"Miniver" => "Miniver",
	"Miss Fajardose" => "Miss Fajardose",
	"Modern Antiqua" => "Modern Antiqua",
	"Molengo" => "Molengo",
	"Monofett" => "Monofett",
	"Monoton" => "Monoton",
	"Monsieur La Doulaise" => "Monsieur La Doulaise",
	"Montaga" => "Montaga",
	"Montez" => "Montez",
	"Montserrat" => "Montserrat",
	"Moul" => "Moul",
	"Moulpali" => "Moulpali",
	"Mountains of Christmas" => "Mountains of Christmas",
	"Mr Bedfort" => "Mr Bedfort",
	"Mr Dafoe" => "Mr Dafoe",
	"Mr De Haviland" => "Mr De Haviland",
	"Mrs Saint Delafield" => "Mrs Saint Delafield",
	"Mrs Sheppards" => "Mrs Sheppards",
	"Muli" => "Muli",
	"Mystery Quest" => "Mystery Quest",
	"Neucha" => "Neucha",
	"Neuton" => "Neuton",
	"News Cycle" => "News Cycle",
	"Niconne" => "Niconne",
	"Nixie One" => "Nixie One",
	"Nobile" => "Nobile",
	"Nokora" => "Nokora",
	"Norican" => "Norican",
	"Nosifer" => "Nosifer",
	"Nothing You Could Do" => "Nothing You Could Do",
	"Noticia Text" => "Noticia Text",
	"Nova Cut" => "Nova Cut",
	"Nova Flat" => "Nova Flat",
	"Nova Mono" => "Nova Mono",
	"Nova Oval" => "Nova Oval",
	"Nova Round" => "Nova Round",
	"Nova Script" => "Nova Script",
	"Nova Slim" => "Nova Slim",
	"Nova Square" => "Nova Square",
	"Numans" => "Numans",
	"Nunito" => "Nunito",
	"Odor Mean Chey" => "Odor Mean Chey",
	"Old Standard TT" => "Old Standard TT",
	"Oldenburg" => "Oldenburg",
	"Oleo Script" => "Oleo Script",
	"Open Sans" => "Open Sans",
	"Open Sans Condensed" => "Open Sans Condensed",
	"Oranienbaum" => "Oranienbaum",
	"Orbitron" => "Orbitron",
	"Oregano" => "Oregano",
	"Orienta" => "Orienta",
	"Original Surfer" => "Original Surfer",
	"Oswald" => "Oswald",
	"Over the Rainbow" => "Over the Rainbow",
	"Overlock" => "Overlock",
	"Overlock SC" => "Overlock SC",
	"Ovo" => "Ovo",
	"Oxygen" => "Oxygen",
	"Oxygen Mono" => "Oxygen Mono",
	"PT Mono" => "PT Mono",
	"PT Sans" => "PT Sans",
	"PT Sans Caption" => "PT Sans Caption",
	"PT Sans Narrow" => "PT Sans Narrow",
	"PT Serif" => "PT Serif",
	"PT Serif Caption" => "PT Serif Caption",
	"Pacifico" => "Pacifico",
	"Pathway Gothic One" => "Pathway Gothic One",
	"Parisienne" => "Parisienne",
	"Passero One" => "Passero One",
	"Passion One" => "Passion One",
	"Patrick Hand" => "Patrick Hand",
	"Patua One" => "Patua One",
	"Paytone One" => "Paytone One",
	"Peralta" => "Peralta",
	"Permanent Marker" => "Permanent Marker",
	"Petit Formal Script" => "Petit Formal Script",
	"Petrona" => "Petrona",
	"Philosopher" => "Philosopher",
	"Piedra" => "Piedra",
	"Pinyon Script" => "Pinyon Script",
	"Plaster" => "Plaster",
	"Play" => "Play",
	"Playball" => "Playball",
	"Playfair Display" => "Playfair Display",
	"Podkova" => "Podkova",
	"Poiret One" => "Poiret One",
	"Poller One" => "Poller One",
	"Poly" => "Poly",
	"Pompiere" => "Pompiere",
	"Pontano Sans" => "Pontano Sans",
	"Port Lligat Sans" => "Port Lligat Sans",
	"Port Lligat Slab" => "Port Lligat Slab",
	"Prata" => "Prata",
	"Preahvihear" => "Preahvihear",
	"Press Start 2P" => "Press Start 2P",
	"Princess Sofia" => "Princess Sofia",
	"Prociono" => "Prociono",
	"Prosto One" => "Prosto One",
	"Puritan" => "Puritan",
	"Quando" => "Quando",
	"Quantico" => "Quantico",
	"Quattrocento" => "Quattrocento",
	"Quattrocento Sans" => "Quattrocento Sans",
	"Questrial" => "Questrial",
	"Quicksand" => "Quicksand",
	"Qwigley" => "Qwigley",
	"Racing Sans One" => "Racing Sans One",
	"Radley" => "Radley",
	"Raleway" => "Raleway",
	"Raleway Dots" => "Raleway Dots",
	"Rammetto One" => "Rammetto One",
	"Ranchers" => "Ranchers",
	"Rancho" => "Rancho",
	"Rationale" => "Rationale",
	"Redressed" => "Redressed",
	"Reenie Beanie" => "Reenie Beanie",
	"Revalia" => "Revalia",
	"Ribeye" => "Ribeye",
	"Ribeye Marrow" => "Ribeye Marrow",
	"Righteous" => "Righteous",
	"Rochester" => "Rochester",
	"Rock Salt" => "Rock Salt",
	"Rokkitt" => "Rokkitt",
	"Romanesco" => "Romanesco",
	"Ropa Sans" => "Ropa Sans",
	"Rosario" => "Rosario",
	"Rosarivo" => "Rosarivo",
	"Rouge Script" => "Rouge Script",
	"Ruda" => "Ruda",
	"Ruge Boogie" => "Ruge Boogie",
	"Ruluko" => "Ruluko",
	"Ruslan Display" => "Ruslan Display",
	"Russo One" => "Russo One",
	"Ruthie" => "Ruthie",
	"Roboto" => "Roboto",
	"Rye" => "Rye",
	"Sail" => "Sail",
	"Salsa" => "Salsa",
	"Sancreek" => "Sancreek",
	"Sansita One" => "Sansita One",
	"Sarina" => "Sarina",
	"Satisfy" => "Satisfy",
	"Schoolbell" => "Schoolbell",
	"Seaweed Script" => "Seaweed Script",
	"Sevillana" => "Sevillana",
	"Shadows Into Light" => "Shadows Into Light",
	"Shadows Into Light Two" => "Shadows Into Light Two",
	"Shanti" => "Shanti",
	"Share" => "Share",
	"Shojumaru" => "Shojumaru",
	"Short Stack" => "Short Stack",
	"Siemreap" => "Siemreap",
	"Sigmar One" => "Sigmar One",
	"Signika" => "Signika",
	"Signika Negative" => "Signika Negative",
	"Simonetta" => "Simonetta",
	"Sirin Stencil" => "Sirin Stencil",
	"Six Caps" => "Six Caps",
	"Skranji" => "Skranji",
	"Slackey" => "Slackey",
	"Smokum" => "Smokum",
	"Smythe" => "Smythe",
	"Sniglet" => "Sniglet",
	"Snippet" => "Snippet",
	"Sofia" => "Sofia",
	"Sonsie One" => "Sonsie One",
	"Sorts Mill Goudy" => "Sorts Mill Goudy",
	"Source Sans Pro" => "Source Sans Pro",
	"Special Elite" => "Special Elite",
	"Spicy Rice" => "Spicy Rice",
	"Spinnaker" => "Spinnaker",
	"Spirax" => "Spirax",
	"Squada One" => "Squada One",
	"Stardos Stencil" => "Stardos Stencil",
	"Stint Ultra Condensed" => "Stint Ultra Condensed",
	"Stint Ultra Expanded" => "Stint Ultra Expanded",
	"Stoke" => "Stoke",
	"Sue Ellen Francisco" => "Sue Ellen Francisco",
	"Sunshiney" => "Sunshiney",
	"Supermercado One" => "Supermercado One",
	"Suwannaphum" => "Suwannaphum",
	"Swanky and Moo Moo" => "Swanky and Moo Moo",
	"Syncopate" => "Syncopate",
	"Tangerine" => "Tangerine",
	"Taprom" => "Taprom",
	"Telex" => "Telex",
	"Tenor Sans" => "Tenor Sans",
	"The Girl Next Door" => "The Girl Next Door",
	"Tienne" => "Tienne",
	"Tinos" => "Tinos",
	"Titan One" => "Titan One",
	"Trade Winds" => "Trade Winds",
	"Trocchi" => "Trocchi",
	"Trochut" => "Trochut",
	"Trykker" => "Trykker",
	"Tulpen One" => "Tulpen One",
	"Ubuntu" => "Ubuntu",
	"Ubuntu Condensed" => "Ubuntu Condensed",
	"Ubuntu Mono" => "Ubuntu Mono",
	"Ultra" => "Ultra",
	"Uncial Antiqua" => "Uncial Antiqua",
	"UnifrakturCook" => "UnifrakturCook",
	"UnifrakturMaguntia" => "UnifrakturMaguntia",
	"Unkempt" => "Unkempt",
	"Unlock" => "Unlock",
	"Unna" => "Unna",
	"VT323" => "VT323",
	"Varela" => "Varela",
	"Varela Round" => "Varela Round",
	"Vast Shadow" => "Vast Shadow",
	"Vibur" => "Vibur",
	"Vidaloka" => "Vidaloka",
	"Viga" => "Viga",
	"Voces" => "Voces",
	"Volkhov" => "Volkhov",
	"Vollkorn" => "Vollkorn",
	"Voltaire" => "Voltaire",
	"Waiting for the Sunrise" => "Waiting for the Sunrise",
	"Wallpoet" => "Wallpoet",
	"Walter Turncoat" => "Walter Turncoat",
	"Warnes" => "Warnes",
	"Wellfleet" => "Wellfleet",
	"Wire One" => "Wire One",
	"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
	"Yellowtail" => "Yellowtail",
	"Yeseva One" => "Yeseva One",
	"Yesteryear" => "Yesteryear",
	"Zeyada" => "Zeyad"
	);        
	
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','13','14','16','18','20','24','28','34' ),
		'faces' =>  false,
		'styles' => array( 'normal' => 'Normal', 'bold' => 'Bold' ),
		'color' => true
	);
	
		// Typography Options
	$typography_p_options = array(
		'sizes' => array( '6','12','13','14','16','18','20','24','28','34' ),
		'faces' => $google_faces,
		'styles' => array( 'normal' => 'Normal', 'bold' => 'Bold' ),
		'color' => true
	);

	$typograph_p = array(
		'size' => '14px',	
		'face' => 'Roboto',	
		'style' => 'normal',
		'color' => '#545454');         

	
	$typography_header = array(
		'sizes' => false,
		'faces' => $os_font,
		'styles' => false,
		'color' => false
	);     
	
        
	$typograph_h1 = array(
		'size' => '34px',		
		'style' => 'normal',
		'color' => '#333333');
 
	$typograph_h2 = array(
		'size' => '28px',		
		'style' => 'normal',
		'color' => '#333333');    
	$typograph_h3 = array(
		'size' => '24px',		
		'style' => 'normal',
		'color' => '#333333'); 

	$typograph_h4 = array(
		'size' => '18px',		
		'style' => 'normal',
		'color' => '#333333');    
        
	$typograph_h5 = array(
		'size' => '16px',		
		'style' => 'normal',
		'color' => '#333333'); 
        
	$typograph_h6 = array(
		'size' => '13px',		
		'style' => 'normal',
		'color' => '#333333');    
	        
	$typography_header = array(
		'sizes' => false,
		'faces' => $os_font,
		'styles' => false,
		'color' => false
	);        
        
       $typography_google_header = array(
		'sizes' => false,
		'faces' => $google_faces,
		'styles' => array( 'normal' => 'Normal', 'bold' => 'Bold' ),
		'color' => false
	);  


	// Option sidebar
	$option_sidebar = array();
	$sidebars = get_option('sbg_sidebars');
	$option_sidebar['']='';
	
	if(isset($sidebars)) {
		if(is_array($sidebars)) {			
			foreach($sidebars as $sidebar) {				
				$option_sidebar[$sidebar] = $sidebar;
			}
			
		}
	}


	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
 
 
	$options_ticker = array();
    $options_ticker[0] = __('Recently Posts', 'tl_back');
	$options_ticker_obj = get_categories();
	foreach ($options_ticker_obj as $category) {
		$options_ticker[$category->cat_ID] = $category->cat_name;
	}        
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}



	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';

	$options = array();
        
        
        $options[] = array(
		'name' => __('General Setting', 'tl_back'),
		'type' => 'heading');

 		$options[] = array(
		'name' => "Logo option",
		'desc' => "This option for use logo in text or image",
		'id' => "logo_option",
		'std' => "logo_image_option",
		'type' => "images",
		'options' => array(
			'logo_image_option' => $imagepath . 'logo_image.png',
			'logo_text_option' => $imagepath . 'logo_text.png'
			)
		);		
		
        $options[] = array(
		'name' => __('Your website logo', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'logo_uploader',
		'type' => 'upload');
        $options[] = array(
		'name' => __('Your website favicon', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'favicon_uploader',
		'type' => 'upload'); 

 		$options[] = array(
		'name' => "Layout option",
		'desc' => "This option for full width or boxed width version.",
		'id' => "full_box_option",
		'std' => "box_image_option",
		'type' => "images",
		'options' => array(
			'full_image_option' => $imagepath . 'full.png',
			'box_image_option' => $imagepath . 'box.png'
			)
		);

	$options[] = array(
		'name' => __('Theme color', 'tl_back'),
		'desc' => __('Choose theme color for your template.', 'tl_back'),
		'id' => 'theme_color',
		'std' => '',
		'type' => 'color' );  
		

		$options[] = array(
		'name' => __('logo align', 'tl_back'),
		'desc' => __('For logo align when option header full width.', 'tl_back'),
		'id' => 'logo_align_option',
		'type' => 'select',
			'options' => array(
			'left' => 'left',
			'center' => 'center',
			'right' => 'right'
		)
	); 
        
	$options[] = array(
		'name' => __('Disable responsive Design', 'tl_back'),
		'desc' => __('Enable or disable responsive layout.', 'tl_back'),
		'id' => 'disable_design',
		'std' => '0',
		'type' => 'checkbox');                  

	$options[] = array(
		'name' => __('Disable Search', 'tl_back'),
		'desc' => __('Enable or disable search on right main menu.', 'tl_back'),
		'id' => 'disable_search_menu',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable Newsticker', 'tl_back'),
		'desc' => __('Enable or disable Newsticker.', 'tl_back'),
		'id' => 'enable_newsticker',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Number of Post in ticker', 'tl_back'),
		'desc' => __('Show number of post in news ticker.', 'tl_back'),
		'id' => 'newsticker_num',
		'std' => '5',	
        'class' => 'mini',
		'type' => 'text');         
	$options[] = array(
		'name' => __('News ticker category', 'tl_back'),
		'desc' => __('Choose category for news ticker.', 'tl_back'),
		'id' => 'ticker_categories',
		'type' => 'select',
		'options' => $options_ticker);

	$options[] = array(
		'name' => __('Disable sticky main menu', 'tl_back'),
		'desc' => __('Enable or disable sticky main menu.', 'tl_back'),
		'id' => 'disable_sticky',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Disable breadcrumbs', 'tl_back'),
		'desc' => __('Enable or disable breadcrumbs.', 'tl_back'),
		'id' => 'disable_breadcrumbs',
		'std' => '1',
		'type' => 'checkbox');		
                                  
        
	$options[] = array(
		'name' => __('Bottom menu', 'tl_back'),
		'desc' => __('Enable or disable your bottom menu.', 'tl_back'),
		'id' => 'enable_menu_bottom',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Top menu', 'tl_back'),
		'desc' => __('Enable or disable your top menu.', 'tl_back'),
		'id' => 'enable_menu_top',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Top social network', 'tl_back'),
		'desc' => __('Enable or disable your Top social network.', 'tl_back'),
		'id' => 'enable_social_top',
		'std' => '1',
		'type' => 'checkbox');		

		$options[] = array(
		'name' => __('Carousel on homepage right post list', 'tl_back'),
		'desc' => __('Enable or disable Carousel on homepage right post list.', 'tl_back'),
		'id' => 'carousel_homepage_normal_option',
		'std' => '1',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Carousel on homepage with caption', 'tl_back'),
		'desc' => __('Enable or disable Carousel homepage with caption.', 'tl_back'),
		'id' => 'carousel_homepage_with_caption',
		'std' => '1',
		'type' => 'checkbox');		

		$options[] = array(
		'name' => __('Carousel on homepage grid post', 'tl_back'),
		'desc' => __('Enable or disable Carousel on homepage grid post.', 'tl_back'),
		'id' => 'carousel_homepage_grid_option',
		'std' => '1',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Carousel on homepage list post', 'tl_back'),
		'desc' => __('Enable or disable Carousel on homepage list post.', 'tl_back'),
		'id' => 'carousel_homepage_list_option',
		'std' => '1',
		'type' => 'checkbox');

		$options[] = array(
		'name' => __('Carousel on homepage no slider', 'tl_back'),
		'desc' => __('Enable or disable Carousel on homepage no slider.', 'tl_back'),
		'id' => 'carousel_homepage_no_slider_option',
		'std' => '0',
		'type' => 'checkbox');		

	$options[] = array(
		'name' => __('Google analytics code', 'tl_back'),
		'desc' => __('Script for google analytics traffic your website without <script> tags', 'tl_back'),
		'id' => 'tracking_code',
		'std' => '',
		'type' => 'textarea');
				        
	$options[] = array(
		'name' => __('Footer copyright', 'tl_back'),
		'desc' => __('Enable or disable footer copyright.', 'tl_back'),
		'id' => 'copyright',
		'std' => 'Copyright 2013 Themeloy / All rights reserved',
		'type' => 'textarea');
        //End Gerneral setting
	
	
	    //background option
	$options[] = array(
		'name' => __('Body Background', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => "Background option",
		'desc' => __('Choose background option for your theme', 'tl_back'),
		'id' => "background_option",
		'std' => "background_parttern",
		'type' => "images",
		'options' => array(
			'background_parttern' => $imagepath . 'bg_parttern.png',
			'background_image' => $imagepath . 'bg_big_img.png',
			'background_color_image' => $imagepath . 'bg_color_img.png'
			)
	);
        
	$options[] = array(
		'name' => "Background parttern",
		'desc' => "",
		'id' => "background_parttern",
		'std' => "purty_wood",
		'type' => "images",
		'options' => array(
			'black_lozenge' => $imagepath . 'parttern/black_lozenge.png',
			'lghtmesh' => $imagepath . 'parttern/lghtmesh.png',
			'nasty_fabric' => $imagepath . 'parttern/nasty_fabric.png',
			'purty_wood' => $imagepath . 'parttern/purty_wood.png',
			'retina_wood' => $imagepath . 'parttern/retina_wood.png',
			'subtle_stripes' => $imagepath . 'parttern/subtle_stripes.png',
			'vertical_cloth' => $imagepath . 'parttern/vertical_cloth.png',
			'wild_oliva' => $imagepath . 'parttern/wild_oliva.png',
			'wood_pattern' => $imagepath . 'parttern/wood_pattern.png',
			'cartographer' => $imagepath . 'parttern/cartographer.png',
			'dark_wood' => $imagepath . 'parttern/dark_wood.png',
			'diagmonds' => $imagepath . 'parttern/diagmonds.png',
			'diamond_upholstery' => $imagepath . 'parttern/diamond_upholstery.png',
			'gplaypattern' => $imagepath . 'parttern/gplaypattern.png',
			'noisy_grid' => $imagepath . 'parttern/noisy_grid.png',
			'shattered' => $imagepath . 'parttern/shattered.png',
			'tasky_pattern' => $imagepath . 'parttern/tasky_pattern.png',
			'use_your_illusion' => $imagepath . 'parttern/use_your_illusion.png',
			'white_carbonfiber' => $imagepath . 'parttern/white_carbonfiber.png'
			)
	);
	
	    $options[] = array(
		'name' => __('Background large Image', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'background_large_image',
		'type' => 'upload');		  


		$options[] = array(
		'name' => __('Background color or background .png with color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'background_color_png',
		'std' => '',
		'type' => 'color' ); 

    $options[] = array(
		'name' => __('', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'background_color_img_png',
		'type' => 'upload');  
	    
        


		$options[] = array(
		'name' => __('Background repeat option', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'main_background_repeat_option',
		'type' => 'select',
			'options' => array(
			'' => '',
			'repeat' => 'repeat',
			'no-repeat' => 'no-repeat',
			'repeat-x' => 'repeat-x',
			'repeat-y' => 'repeat-y'
		)
	);
	
			$options[] = array(
		'name' => __('Background position option', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'main_background_position_option',
		'type' => 'select',
			'options' => array(
			'' => '',
			'fixed' => 'fixed',
			'scroll' => 'scroll'
		)
	);
	
			$options[] = array(
		'name' => __('Background horizontal option', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'main_background_horizontal_option',
		'type' => 'select',
			'options' => array(
			'' => '',
			'left' => 'left',
			'right' => 'right',
			'center' => 'center'
		)
	);
	
			$options[] = array(
		'name' => __('Background vertical option', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'main_background_vertical_option',
		'type' => 'select',
			'options' => array(
			'' => '',
			'top' => 'top',
			'center' => 'center',
			'bottom' => 'bottom'
		)
	);
	
		
		
        $wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
        //End background option
	


	
	    //Slider option
	$options[] = array(
		'name' => __('Slider option', 'tl_back'),
		'type' => 'heading');   


	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	
	$options[] = array(
		'name' => __('Slider category', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'slider_category_select',
		'std' => '', // These items get checked by default
		'type' => 'multicheck',
		'options' => $options_categories);

	$options[] = array(
		'name' => __('Category on right slider', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'category_on_right_slider',
		'std' => '', // These items get checked by default
		'type' => 'multicheck',
		'options' => $options_categories);


		$options[] = array(
		'name' => __('Slider effect', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_effect_option',
		'std' => 'fade',
		'type' => 'select',
			'options' => array(
			'fade' => 'fade',
			'sliceDown' => 'sliceDown',
			'sliceDownLeft' => 'sliceDownLeft',
			'sliceUp' => 'sliceUp',
			'sliceUpLeft' => 'sliceUpLeft',
			'sliceUpDown' => 'sliceUpDown',
			'sliceUpDownLeft' => 'sliceUpDownLeft',
			'slideInRight' => 'slideInRight',
			'slideInLeft' => 'slideInLeft',
			'boxRandom' => 'boxRandom',
			'boxRain' => 'boxRain',
			'boxRainReverse' => 'boxRainReverse',
			'boxRainGrow' => 'boxRainGrow',
			'boxRainGrowReverse' => 'boxRainGrowReverse'
		)
	);
	
		$options[] = array(
		'name' => __('Number of category on right slider', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'number_slider_right',
		'std' => '5',
		'type' => 'text');	
		
		$options[] = array(
		'name' => __('Number of slider', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_number',
		'std' => '5',
		'type' => 'text');	
		
		$options[] = array(
		'name' => __('Slider caption on homepage grid and list', 'tl_back'),
		'desc' => __('Enable or disable Slider caption on homepage grid and list.', 'tl_back'),
		'id' => 'slider_homepage_grid_list',
		'std' => '0',
		'type' => 'checkbox');

		$options[] = array(
		'name' => __('Slider on normal homepage', 'tl_back'),
		'desc' => __('Enable or disable Slider on normal homepage.', 'tl_back'),
		'id' => 'slider_homepage_normal_option',
		'std' => '1',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Slider on homepage grid post', 'tl_back'),
		'desc' => __('Enable or disable Slider on homepage grid post.', 'tl_back'),
		'id' => 'slider_homepage_grid_option',
		'std' => '1',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Slider on homepage list post', 'tl_back'),
		'desc' => __('Enable or disable Slider on homepage list post.', 'tl_back'),
		'id' => 'slider_homepage_list_option',
		'std' => '1',
		'type' => 'checkbox');
						
		$options[] = array(
		'name' => __('Slider caption background', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_caption_option',
		'std' => '',
		'type' => 'color' ); 	
	
		$options[] = array(
		'name' => __('Slider read more background and slider nav background', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_more_nav_option',
		'std' => '',
		'type' => 'color' ); 	
		
		$options[] = array(
		'name' => __('Slider heading background color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_heading_option',
		'std' => '',
		'type' => 'color' ); 
		
		$options[] = array(
		'name' => __('Slider meta(date, author, category, comment) color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_meta_option',
		'std' => '',
		'type' => 'color' );
		$options[] = array(
		'name' => __('Slider description color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'slider_desc_option',
		'std' => '',
		'type' => 'color' );
		
	//End slider option
	
	    
        
        //Menu option
    
	$options[] = array(
		'name' => __('Menu color', 'tl_back'),
		'type' => 'heading');   

	$options[] = array(
		'name' => __('Main menu background', 'tl_back'),
		'desc' => __('Main menu background option', 'tl_back'),
		'id' => 'main-menu-background',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Main menu home background and border', 'tl_back'),
		'desc' => __('Main menu home background and border option', 'tl_back'),
		'id' => 'main-menu-home-border-background',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Newsticker background', 'tl_back'),
		'desc' => __('Newsticker background option', 'tl_back'),
		'id' => 'newsticker-background',
		'std' => '',
		'type' => 'color' );		
		
		
       //Typography
       $options[] = array(
		'name' => __('Typography', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => __('Paragraph Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "p_typ",
		'std' => $typograph_p,
		'type' => 'typography',
		'options' => $typography_p_options);  

		$options[] = array(
		'name' => __('Link color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'link_color',
		'std' => '',
		'type' => 'color' ); 

		$options[] = array(
		'name' => __('Link hover color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'link_hover_color',
		'std' => '',
		'type' => 'color' ); 		
        
             $options[] = array(
		'name' => __('Heading and main menu Google Font', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "header_google_font",
		'std' => $typography_google_defaults,
		'type' => 'typography',
		'options' => $typography_google_header);  
        
	$options[] = array(
		'name' => __('H1 Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "h1_typ",
		'std' => $typograph_h1,
		'type' => 'typography',
		'options' => $typography_options );  
	$options[] = array(
		'name' => __('H2 Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "h2_typ",
		'std' => $typograph_h2,
		'type' => 'typography',
		'options' => $typography_options );     
	$options[] = array(
		'name' => __('H3 Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "h3_typ",
		'std' => $typograph_h3,
		'type' => 'typography',
		'options' => $typography_options );   
	$options[] = array(
		'name' => __('H4 Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "h4_typ",
		'std' => $typograph_h4,
		'type' => 'typography',
		'options' => $typography_options ); 
	$options[] = array(
		'name' => __('H5 Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "h5_typ",
		'std' => $typograph_h5,
		'type' => 'typography',
		'options' => $typography_options );       
	$options[] = array(
		'name' => __('H6 Typography', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => "h6_typ",
		'std' => $typograph_h6,
		'type' => 'typography',
		'options' => $typography_options );   
        
        //end typography
         
        //Blog
	$options[] = array(
		'name' => __('Blog', 'tl_back'),
		'type' => 'heading');   
 
 
 		$options[] = array(
		'name' => "Blog layout",
		'desc' => "",
		'id' => "blog_layout",
		'std' => "blog_layout2",
		'type' => "images",
		'options' => array(
			'blog_layout1' => $imagepath . '/blog1.png',
			'blog_layout2' => $imagepath . '/blog2.png'
			)
		);
 
   	$options[] = array(
		'name' => __('Show date', 'tl_back'),
		'desc' => __('Hide date in post and single post', 'tl_back'),
		'id' => 'blog_date_post',
		'std' => '1',
		'type' => 'checkbox');
		
   	$options[] = array(
		'name' => __('Show author name', 'tl_back'),
		'desc' => __('Hide author name in post and single post', 'tl_back'),
		'id' => 'blog_author_name',
		'std' => '1',
		'type' => 'checkbox');

  	$options[] = array(
		'name' => __('Show category', 'tl_back'),
		'desc' => __('Hide category in post and single post', 'tl_back'),
		'id' => 'blog_category_post',
		'std' => '1',
		'type' => 'checkbox');
		
  	$options[] = array(
		'name' => __('Show comment', 'tl_back'),
		'desc' => __('Hide comment count in post and single post', 'tl_back'),
		'id' => 'blog_comment_post',
		'std' => '1',
		'type' => 'checkbox'); 
		
  	$options[] = array(
		'name' => __('Show tag', 'tl_back'),
		'desc' => __('Hide tag in post and single post', 'tl_back'),
		'id' => 'blog_tag_post',
		'std' => '1',
		'type' => 'checkbox'); 
		
 	$options[] = array(
		'name' => __('Show share', 'tl_back'),
		'desc' => __('Hide share in post and single post', 'tl_back'),
		'id' => 'blog_share_post',
		'std' => '1',
		'type' => 'checkbox'); 
		
 	$options[] = array(
		'name' => __('Show Next and Previous post', 'tl_back'),
		'desc' => __('Hide next and previous post in post and single post', 'tl_back'),
		'id' => 'blog_nav',
		'std' => '1',
		'type' => 'checkbox'); 
		                   
	$options[] = array(
		'name' => __('Hide Author Profile', 'tl_back'),
		'desc' => __('Hide author profile box in single post', 'tl_back'),
		'id' => 'blog_author',
		'std' => '1',
		'type' => 'checkbox');      

	$options[] = array(
		'name' => __('Show All review', 'tl_back'),
		'desc' => __('Show all review in post and single post', 'tl_back'),
		'id' => 'enable_all_review',
		'std' => '1',                
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show All user review', 'tl_back'),
		'desc' => __('Show all user review in post and single post', 'tl_back'),
		'id' => 'enable_all_user_review',
		'std' => '1',                
		'type' => 'checkbox');

		
	$options[] = array(
		'name' => __('Enable feature image on post Content', 'tl_back'),
		'desc' => __('Enable feature image on single post content', 'tl_back'),
		'id' => 'blog_post_feautre',
		'std' => '0',                
		'type' => 'checkbox');
 
 $options[] = array(
		'name' => __('Show related post', 'tl_back'),
		'desc' => __('Show related post below the single post', 'tl_back'),
		'id' => 'blog_related',
		'std' => '1',                
		'type' => 'checkbox');
		
 $options[] = array(
		'name' => __('Number of related post', 'tl_back'),
		'desc' => __('Amount of post that you wnat to show in related post box', 'tl_back'),
		'id' => 'blog_related_num',
		'std' => '4',	
        'class' => 'mini',
		'type' => 'text');   
   
        
        //Social Media
	$options[] = array(
		'name' => __('Social Media', 'tl_back'),
		'type' => 'heading'); 
		
        
	$options[] = array(
		'name' => __('Facebook', 'tl_back'),
		'desc' => __('Facebook URL', 'tl_back'),
		'id' => 'facebook_url',
		'std' => '#',		
		'type' => 'text'); 

	$options[] = array(
		'name' => __('Twitter', 'tl_back'),
		'desc' => __('Twitter URL', 'tl_back'),
		'id' => 'twitter_url',
		'std' => '#',		
		'type' => 'text'); 
        
	$options[] = array(
		'name' => __('GooglePlus', 'tl_back'),
		'desc' => __('Google Plus URL', 'tl_back'),
		'id' => 'gplus_url',
		'std' => '#',		
		'type' => 'text');  
		
	$options[] = array(
		'name' => __('Google', 'tl_back'),
		'desc' => __('Google  URL', 'tl_back'),
		'id' => 'google_url',
		'std' => '',		
		'type' => 'text');         
        
	$options[] = array(
		'name' => __('RSS', 'tl_back'),
		'desc' => __('Feed URL', 'tl_back'),
		'id' => 'rss_url',
		'std' => '#',		
		'type' => 'text');   
        
	$options[] = array(
		'name' => __('Pinterest', 'tl_back'),
		'desc' => __('Pinterest URL', 'tl_back'),
		'id' => 'pin_url',
		'std' => '#',		
		'type' => 'text');        
	$options[] = array(
		'name' => __('LinkedIn', 'tl_back'),
		'desc' => __('Linkedin URL', 'tl_back'),
		'id' => 'linked_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Behance', 'tl_back'),
		'desc' => __('Behance URL', 'tl_back'),
		'id' => 'behance_url',
		'std' => '',		
		'type' => 'text');       
	$options[] = array(
		'name' => __('Dribbble', 'tl_back'),
		'desc' => __('Dribbble URL', 'tl_back'),
		'id' => 'dribbble_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Evernote', 'tl_back'),
		'desc' => __('Evernote URL', 'tl_back'),
		'id' => 'evernote_url',
		'std' => '',		
		'type' => 'text');  	
	$options[] = array(
		'name' => __('Grooveshark', 'tl_back'),
		'desc' => __('Grooveshark URL', 'tl_back'),
		'id' => 'grooveshark_url',
		'std' => '',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Instagram', 'tl_back'),
		'desc' => __('Instagram URL', 'tl_back'),
		'id' => 'instagram_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Vimeo', 'tl_back'),
		'desc' => __('Vimeo URL', 'tl_back'),
		'id' => 'vimeo_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('WordPress', 'tl_back'),
		'desc' => __('WordPress URL', 'tl_back'),
		'id' => 'wordpress_url',
		'std' => '',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Youtube', 'tl_back'),
		'desc' => __('Youtube URL', 'tl_back'),
		'id' => 'youtube_url',
		'std' => '',		
		'type' => 'text'); 
	$options[] = array(
		'name' => __('Aim', 'tl_back'),
		'desc' => __('Aim URL', 'tl_back'),
		'id' => 'aim_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Blogger', 'tl_back'),
		'desc' => __('Blogger URL', 'tl_back'),
		'id' => 'blogger_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Delicious', 'tl_back'),
		'desc' => __('Delicious URL', 'tl_back'),
		'id' => 'delicious_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Deviantart', 'tl_back'),
		'desc' => __('Deviantart URL', 'tl_back'),
		'id' => 'deviantart_url',
		'std' => '',		
		'type' => 'text');		
	$options[] = array(
		'name' => __('Digg', 'tl_back'),
		'desc' => __('Digg URL', 'tl_back'),
		'id' => 'digg_url',
		'std' => '',		
		'type' => 'text');		 		 
	$options[] = array(
		'name' => __('Flickr', 'tl_back'),
		'desc' => __('Flickr URL', 'tl_back'),
		'id' => 'flickr_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Friendfeed', 'tl_back'),
		'desc' => __('Friendfeed URL', 'tl_back'),
		'id' => 'friendfeed_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Friendster', 'tl_back'),
		'desc' => __('Friendster URL', 'tl_back'),
		'id' => 'friendster_url',
		'std' => '',		
		'type' => 'text');		
	$options[] = array(
		'name' => __('Furl', 'tl_back'),
		'desc' => __('Furl URL', 'tl_back'),
		'id' => 'furl_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('GitHub', 'tl_back'),
		'desc' => __('GitHub URL', 'tl_back'),
		'id' => 'GitHub_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Google_talk', 'tl_back'),
		'desc' => __('Google_talk URL', 'tl_back'),
		'id' => 'google_talk_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Lastfm', 'tl_back'),
		'desc' => __('Lastfm URL', 'tl_back'),
		'id' => 'lastfm_url',
		'std' => '',		
		'type' => 'text');		
	$options[] = array(
		'name' => __('Livejournal', 'tl_back'),
		'desc' => __('Livejournal URL', 'tl_back'),
		'id' => 'livejournal_url',
		'std' => '',		
		'type' => 'text');					
	$options[] = array(
		'name' => __('Magnolia', 'tl_back'),
		'desc' => __('Magnolia URL', 'tl_back'),
		'id' => 'magnolia_url',
		'std' => '',		
		'type' => 'text');	
	$options[] = array(
		'name' => __('Mixx', 'tl_back'),
		'desc' => __('Mixx URL', 'tl_back'),
		'id' => 'mixx_url',
		'std' => '',		
		'type' => 'text');	
	$options[] = array(
		'name' => __('Myspace', 'tl_back'),
		'desc' => __('Myspace URL', 'tl_back'),
		'id' => 'myspace_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Netvibes', 'tl_back'),
		'desc' => __('Netvibes URL', 'tl_back'),
		'id' => 'netvibes_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Newsvine', 'tl_back'),
		'desc' => __('Newsvine URL', 'tl_back'),
		'id' => 'newsvine_url',
		'std' => '',		
		'type' => 'text');		
	$options[] = array(
		'name' => __('Picasa', 'tl_back'),
		'desc' => __('Picasa URL', 'tl_back'),
		'id' => 'picasa_url',
		'std' => '',		
		'type' => 'text');										
	$options[] = array(
		'name' => __('Pownce', 'tl_back'),
		'desc' => __('Pownce URL', 'tl_back'),
		'id' => 'pownce_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('reddit', 'tl_back'),
		'desc' => __('reddit URL', 'tl_back'),
		'id' => 'reddit_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Stumbleupon', 'tl_back'),
		'desc' => __('Stumbleupon URL', 'tl_back'),
		'id' => 'stumbleupon_url',
		'std' => '',		
		'type' => 'text');
				
	$options[] = array(
		'name' => __('Technorati', 'tl_back'),
		'desc' => __('Technorati URL', 'tl_back'),
		'id' => 'technorati_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Webshots', 'tl_back'),
		'desc' => __('Webshots URL', 'tl_back'),
		'id' => 'webshots_url',
		'std' => '',		
		'type' => 'text');
	$options[] = array(
		'name' => __('Websitelink', 'tl_back'),
		'desc' => __('Websitelink URL', 'tl_back'),
		'id' => 'websitelink_url',
		'std' => '',		
		'type' => 'text');						
	$options[] = array(
		'name' => __('yahoo', 'tl_back'),
		'desc' => __('yahoo URL', 'tl_back'),
		'id' => 'yahoo_url',
		'std' => '',		
		'type' => 'text');	
	$options[] = array(
		'name' => __('Yahoo_im', 'tl_back'),
		'desc' => __('Yahoo_im URL', 'tl_back'),
		'id' => 'yahoo_im_url',
		'std' => '',		
		'type' => 'text');	
	$options[] = array(
		'name' => __('Yelp', 'tl_back'),
		'desc' => __('Yelp URL', 'tl_back'),
		'id' => 'yelp_url',
		'std' => '',		
		'type' => 'text');							
		

        //Footer
       $options[] = array(
		'name' => __('Footer', 'tl_back'),
		'type' => 'heading'); 
		
		$options[] = array(
		'name' => "Footer columns",
		'desc' => "",
		'id' => "footer_columns",
		'std' => "footer_3col",
		'type' => "images",
		'options' => array(
			'footer_3col' => $imagepath . '/footer_3col.png',
			'footer_2col' => $imagepath . '/footer_2col.png',
			'footer_1col' => $imagepath . '/footer_1col.png',
			'footer_0_col' => $imagepath . '/footer_0col.png'
			)
		);

	$options[] = array(
		'name' => __('Disable copyright footer', 'tl_back'),
		'desc' => __('Enable or disable copyright footer.', 'tl_back'),
		'id' => 'disable_copyright_footer',
		'std' => '0',
		'type' => 'checkbox');  
	
	$options[] = array(
		'name' => __('Footer color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'footer_text_color',
		'std' => '',
		'type' => 'color' ); 
		
		$options[] = array(
		'name' => __('footer link color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'footer_link_color',
		'std' => '',
		'type' => 'color' ); 
		
		$options[] = array(
		'name' => __('Footer hover link color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'footer_link_hover_color',
		'std' => '',
		'type' => 'color' ); 
		
		$options[] = array(
		'name' => __('Footer background color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'footer_background_color',
		'std' => '',
		'type' => 'color' ); 
		
		$options[] = array(
		'name' => __('Footer copyright background color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'footer_copyright_background_color',
		'std' => '',
		'type' => 'color' ); 

		
		
		 //End Footer

	
			$options[] = array(
		'name' => __('Dynamic sidebar', 'tl_back'),
		'type' => 'heading'); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'pg_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Post', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'po_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Archive page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'ar_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Categories page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'cat_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Tags page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'tag_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Author page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'au_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Search page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'se_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
	
	
	
		
        
		$options[] = array(
		'name' => __('Text', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => __('Latest Update', 'tl_back'),
		'desc' => __('Latest Update', 'tl_back'),
		'id' => 'latest_update',
		'std' => 'Latest Update',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Read more', 'tl_back'),
		'desc' => __('Read more', 'tl_back'),
		'id' => 'read_more',
		'std' => 'Read more',
		'type' => 'text');

		$options[] = array(
		'name' => __('Term Related', 'tl_back'),
		'desc' => __('Related', 'tl_back'),
		'id' => 'rela_articles',
		'std' => 'Related articles',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Term review', 'tl_back'),
		'desc' => __('Review', 'tl_back'),
		'id' => 'term_review',
		'std' => 'Reviews',
		'type' => 'text');
		
		
		$options[] = array(
		'name' => __('Text Description on 404 Page / Not found page', 'tl_back'),
		'desc' => __("Text description on not found page", 'tl_back'),
		'id' => 'term_404',
		'std' => "The page you are looking for doesn't seem to exist.",
		'type' => 'textarea');
		
		$options[] = array(
		'name' => __('Custom CSS', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => __('Custom CSS', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbols '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS max screen 1190px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_1190',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS max screen 959px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_959',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS max screen 767px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_767',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS screen 480px to 767px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_480',
		'std' => "",		
		'type' => 'textarea'		
		);
	
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {


jQuery('#background_option_background_parttern').next('div').next('img').click(function() {
  		jQuery('#section-background_parttern').show();
		jQuery('#section-background_large_image, #section-background_color_png, #section-background_color_img_png').hide();
});
	
jQuery('#background_option_background_image').next('div').next('img').click(function() {
  		jQuery('#section-background_parttern, #section-background_color_png, #section-background_color_img_png').hide();
		jQuery('#section-background_large_image').show();
});

jQuery('#background_option_background_color_image').next('div').next('img').click(function() {
  		jQuery('#section-background_parttern, #section-background_large_image').hide();
		jQuery('#section-background_color_png, #section-background_color_img_png').show();
});

if (jQuery('#background_option_background_parttern:checked').val() !== undefined) {
		jQuery('#section-background_parttern').show();
		jQuery('#section-background_large_image, #section-background_color_png, #section-background_color_img_png').hide();
}

if (jQuery('#background_option_background_image:checked').val() !== undefined) {
		jQuery('#section-background_parttern, #section-background_color_png, #section-background_color_img_png').hide();
		jQuery('#section-background_large_image').show();
}

if (jQuery('#background_option_background_color_image:checked').val() !== undefined) {
		jQuery('#section-background_parttern, #section-background_large_image').hide();
		jQuery('#section-background_color_png, #section-background_color_img_png').show();
}
	

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}