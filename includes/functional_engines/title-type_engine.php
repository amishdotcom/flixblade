<?php

if ($page_type == 'title'){

if ($dps['titleType'] == 'short'){$title_type = "Short";}
elseif ($dps['titleType'] == 'movie'){$title_type = "Movie";}
elseif ($dps['titleType'] == 'tvMovie'){$title_type = "TV Movie";}
elseif ($dps['titleType'] == 'tvSeries'){$title_type = "TV Series";}
elseif ($dps['titleType'] == 'tvEpisode'){$title_type = "TV Episode";}
elseif ($dps['titleType'] == 'tvShort'){$title_type = "TV Short";}
elseif ($dps['titleType'] == 'tvMiniSeries'){$title_type = "TV Mini Series";}
elseif ($dps['titleType'] == 'tvSpecial'){$title_type = "TV Special";}
elseif ($dps['titleType'] == 'video'){$title_type = "Video";}
elseif ($dps['titleType'] == 'videoGame'){$title_type = "Video Game";}
else {$title_type = $dps['titleType'];}

}

if ($page_type == 'search_meta_gen'){

if ($row[2] == 'short'){$title_type = "Short";}
elseif ($row[2] == 'movie'){$title_type = "Movie";}
elseif ($row[2] == 'tvMovie'){$title_type = "TV Movie";}
elseif ($row[2] == 'tvSeries'){$title_type = "TV Series";}
elseif ($row[2] == 'tvEpisode'){$title_type = "TV Episode";}
elseif ($row[2] == 'tvShort'){$title_type = "TV Short";}
elseif ($row[2] == 'tvMiniSeries'){$title_type = "TV Mini Series";}
elseif ($row[2] == 'tvSpecial'){$title_type = "TV Special";}
elseif ($row[2] == 'video'){$title_type = "Video";}
elseif ($row[2] == 'videoGame'){$title_type = "Video Game";}
else {$title_type = $row[2];}

}


?>