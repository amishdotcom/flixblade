<?php
/**
 * 2018 NiNaCoder
 * @author: NiNaCoder <ninacoder2510@gmail.com>
 * © 2018 NiNaCoder https://ninacoder.com
 * International Registered Trademark & Property of NiNaCoder
 * Moded by Amish Dotcom
 */

require_once (__DIR__ . '/includes/init.php');

//For Zero File with only main Site Links (Priority - 1.0) links

$myfile = fopen("sitemap.xml", "w") or die("Unable to open file!");

	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>https://www.baebom.com/</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/add</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/about</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/policy</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/terms</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/dmca</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/developer</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/donate</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>https://www.baebom.com/exclusive/disclaimer</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>';
	$part2 = '</urlset>';
	fwrite($myfile, $part1);
	fwrite($myfile, $map);
	fwrite($myfile, $part2);
	fclose($myfile);


//-----------------------------------------------------------------------------------------------------------------------

//For First File with Initial 50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 0,50000");

while ($row = $db->get_row($sql_result)){

	$row['view_url'] = lyrics_url($row['title'], $row['artist'], $row['hash']);

	$map .= '<url><loc>' . $row['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile1 = fopen("sitemap-1.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile1, $part1);
	fwrite($myfile1, $map);
	fwrite($myfile1, $part2);
	fclose($myfile1);


//-----------------------------------------------------------------------------------------------------------------------

//For Second File with next 50,000-1,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 50000,50000");

while ($row2 = $db->get_row($sql_result)){

	$row2['view_url'] = lyrics_url($row2['title'], $row2['artist'], $row2['hash']);

	$map2 .= '<url><loc>' . $row2['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile2 = fopen("sitemap-2.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile2, $part1);
	fwrite($myfile2, $map2);
	fwrite($myfile2, $part2);
	fclose($myfile2);


//-----------------------------------------------------------------------------------------------------------------------

//For Third File with next 1,00,000-1,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 100000,50000");

while ($row3 = $db->get_row($sql_result)){

	$row3['view_url'] = lyrics_url($row3['title'], $row3['artist'], $row3['hash']);

	$map3 .= '<url><loc>' . $row3['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile3 = fopen("sitemap-3.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile3, $part1);
	fwrite($myfile3, $map3);
	fwrite($myfile3, $part2);
	fclose($myfile3);


//-----------------------------------------------------------------------------------------------------------------------

//For Fourth File with next 1,50,000-2,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 150000,50000");

while ($row4 = $db->get_row($sql_result)){

	$row4['view_url'] = lyrics_url($row4['title'], $row4['artist'], $row4['hash']);

	$map4 .= '<url><loc>' . $row4['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile4 = fopen("sitemap-4.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile4, $part1);
	fwrite($myfile4, $map4);
	fwrite($myfile4, $part2);
	fclose($myfile4);


//-----------------------------------------------------------------------------------------------------------------------

//For Fifth File with next 2,00,000-2,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 200000,50000");

while ($row5 = $db->get_row($sql_result)){

	$row5['view_url'] = lyrics_url($row5['title'], $row5['artist'], $row5['hash']);

	$map5 .= '<url><loc>' . $row5['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile5 = fopen("sitemap-5.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile5, $part1);
	fwrite($myfile5, $map5);
	fwrite($myfile5, $part2);
	fclose($myfile5);


//-----------------------------------------------------------------------------------------------------------------------

//For Sixth File with next 2,50,000-3,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 250000,50000");

while ($row6 = $db->get_row($sql_result)){

	$row6['view_url'] = lyrics_url($row6['title'], $row6['artist'], $row6['hash']);

	$map6 .= '<url><loc>' . $row6['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile6 = fopen("sitemap-6.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile6, $part1);
	fwrite($myfile6, $map6);
	fwrite($myfile6, $part2);
	fclose($myfile6);


//-----------------------------------------------------------------------------------------------------------------------

//For Seventh File with next 3,00,000-3,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 300000,50000");

while ($row7 = $db->get_row($sql_result)){

	$row7['view_url'] = lyrics_url($row7['title'], $row7['artist'], $row7['hash']);

	$map7 .= '<url><loc>' . $row7['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile7 = fopen("sitemap-7.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile7, $part1);
	fwrite($myfile7, $map7);
	fwrite($myfile7, $part2);
	fclose($myfile7);


//-----------------------------------------------------------------------------------------------------------------------

//For Eight File with next 3,50,000-4,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 350000,50000");

while ($row8 = $db->get_row($sql_result)){

	$row8['view_url'] = lyrics_url($row8['title'], $row8['artist'], $row8['hash']);

	$map8 .= '<url><loc>' . $row8['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile8 = fopen("sitemap-8.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile8, $part1);
	fwrite($myfile8, $map8);
	fwrite($myfile8, $part2);
	fclose($myfile8);


//-----------------------------------------------------------------------------------------------------------------------

//For Ninth File with next 4,00,000-4,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 400000,50000");

while ($row9 = $db->get_row($sql_result)){

	$row9['view_url'] = lyrics_url($row9['title'], $row9['artist'], $row9['hash']);

	$map9 .= '<url><loc>' . $row9['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile9 = fopen("sitemap-9.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile9, $part1);
	fwrite($myfile9, $map9);
	fwrite($myfile9, $part2);
	fclose($myfile9);


//-----------------------------------------------------------------------------------------------------------------------

//For Tenth File with next 4,50,000-5,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 450000,50000");

while ($row10 = $db->get_row($sql_result)){

	$row10['view_url'] = lyrics_url($row10['title'], $row10['artist'], $row10['hash']);

	$map10 .= '<url><loc>' . $row10['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile10 = fopen("sitemap-10.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile10, $part1);
	fwrite($myfile10, $map10);
	fwrite($myfile10, $part2);
	fclose($myfile10);


//-----------------------------------------------------------------------------------------------------------------------

//For Elevnth File with next 5,00,000-5,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 500000,50000");

while ($row11 = $db->get_row($sql_result)){

	$row11['view_url'] = lyrics_url($row11['title'], $row11['artist'], $row11['hash']);

	$map11 .= '<url><loc>' . $row11['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile11 = fopen("sitemap-11.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile11, $part1);
	fwrite($myfile11, $map11);
	fwrite($myfile11, $part2);
	fclose($myfile11);


//-----------------------------------------------------------------------------------------------------------------------

//For Twelveth File with next 5,50,000-6,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 550000,50000");

while ($row12 = $db->get_row($sql_result)){

	$row12['view_url'] = lyrics_url($row12['title'], $row12['artist'], $row12['hash']);

	$map12 .= '<url><loc>' . $row12['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile12 = fopen("sitemap-12.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile12, $part1);
	fwrite($myfile12, $map12);
	fwrite($myfile12, $part2);
	fclose($myfile12);


//-----------------------------------------------------------------------------------------------------------------------

//For Thirteenth File with next 6,00,000-6,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 600000,50000");

while ($row13 = $db->get_row($sql_result)){

	$row13['view_url'] = lyrics_url($row13['title'], $row13['artist'], $row13['hash']);

	$map13 .= '<url><loc>' . $row13['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile13 = fopen("sitemap-13.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile13, $part1);
	fwrite($myfile13, $map13);
	fwrite($myfile13, $part2);
	fclose($myfile13);


//-----------------------------------------------------------------------------------------------------------------------

//For Fourteenth File with next 6,50,000-7,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 650000,50000");

while ($row14 = $db->get_row($sql_result)){

	$row14['view_url'] = lyrics_url($row14['title'], $row14['artist'], $row14['hash']);

	$map14 .= '<url><loc>' . $row14['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile14 = fopen("sitemap-14.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile14, $part1);
	fwrite($myfile14, $map14);
	fwrite($myfile14, $part2);
	fclose($myfile14);


//-----------------------------------------------------------------------------------------------------------------------

//For Fifteenth File with next 7,00,000-7,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 700000,50000");

while ($row15 = $db->get_row($sql_result)){

	$row15['view_url'] = lyrics_url($row15['title'], $row15['artist'], $row15['hash']);

	$map15 .= '<url><loc>' . $row15['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile15 = fopen("sitemap-15.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile15, $part1);
	fwrite($myfile15, $map15);
	fwrite($myfile15, $part2);
	fclose($myfile15);


//-----------------------------------------------------------------------------------------------------------------------

//For Sixteenth File with next 7,50,000-8,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 750000,50000");

while ($row16 = $db->get_row($sql_result)){

	$row16['view_url'] = lyrics_url($row16['title'], $row16['artist'], $row16['hash']);

	$map16 .= '<url><loc>' . $row16['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile16 = fopen("sitemap-16.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile16, $part1);
	fwrite($myfile16, $map16);
	fwrite($myfile16, $part2);
	fclose($myfile16);


//-----------------------------------------------------------------------------------------------------------------------

//For Seventeenth File with next 8,00,000-8,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 800000,50000");

while ($row17 = $db->get_row($sql_result)){

	$row17['view_url'] = lyrics_url($row17['title'], $row17['artist'], $row17['hash']);

	$map17 .= '<url><loc>' . $row17['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile17 = fopen("sitemap-17.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile17, $part1);
	fwrite($myfile17, $map17);
	fwrite($myfile17, $part2);
	fclose($myfile17);


//-----------------------------------------------------------------------------------------------------------------------

//For Eighteenth File with next 8,50,000-9,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 850000,50000");

while ($row18 = $db->get_row($sql_result)){

	$row18['view_url'] = lyrics_url($row18['title'], $row18['artist'], $row18['hash']);

	$map18 .= '<url><loc>' . $row18['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile18 = fopen("sitemap-18.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile18, $part1);
	fwrite($myfile18, $map18);
	fwrite($myfile18, $part2);
	fclose($myfile18);


//-----------------------------------------------------------------------------------------------------------------------

//For Nineteenth File with next 9,00,000-9,50,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 900000,50000");

while ($row19 = $db->get_row($sql_result)){

	$row19['view_url'] = lyrics_url($row19['title'], $row19['artist'], $row19['hash']);

	$map19 .= '<url><loc>' . $row19['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile19 = fopen("sitemap-19.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile19, $part1);
	fwrite($myfile19, $map19);
	fwrite($myfile19, $part2);
	fclose($myfile19);


//-----------------------------------------------------------------------------------------------------------------------

//For Twentyth File with next 9,50,000-10,00,000 links

$db->query("SELECT hash, title, artist, cover, count FROM ninacoder_lyrics ORDER BY id LIMIT 950000,50000");

while ($row20 = $db->get_row($sql_result)){

	$row20['view_url'] = lyrics_url($row20['title'], $row20['artist'], $row20['hash']);

	$map20 .= '<url><loc>' . $row20['view_url']. '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';

}

$db->free();

$myfile20 = fopen("sitemap-20.xml", "w") or die("Unable to open file!");
	$part1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$part2 = '</urlset>';
	fwrite($myfile20, $part1);
	fwrite($myfile20, $map20);
	fwrite($myfile20, $part2);
	fclose($myfile20);


$db->close ();


echo"<br><br><br><br><br><br><br><br>";
// Script Execution Time
usleep(mt_rand(100, 10000));
// At the end of your script
$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
echo "<b>Total Execution Time :</b> $time seconds\n";

?>
