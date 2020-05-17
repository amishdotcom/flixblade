<nav class="navbar navbar-expand-lg navbar-light">
<?php
if($page_type == 'title'){include '../../includes/brand_logo.php';}
elseif($page_type == 'root_index' OR $page_type=='serp' OR $page_type=='about' OR $page_type=='vision' OR $page_type=='policy' OR $page_type=='terms' OR $page_type=='contact' OR $page_type=='dmca' OR $page_type=='cora' OR $page_type=='developer' OR $page_type == 'masthead' OR $page_type == 'reportbug' OR $page_type == 'hac' OR $page_type == 'rbl' OR $page_type == 'join_hands' OR $page_type == 'siteversion' OR $page_type == 'dcp' OR $page_type == 'dbversion'){include 'includes/brand_logo.php';}
?>
  
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
 </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="<?php echo $site_root ?>">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?php echo "$site_root/about" ?>">About</a>
    </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Share
      </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_page_url ?>" target="_blank" title="Share Current Page on Facebook">Facebook</a>
        <a class="dropdown-item" href="https://twitter.com/share?url=<?php echo $current_page_url ?>" target="_blank" title="Share Current Page on Twitter">Twitter</a>
	    <a class="dropdown-item" href="https://www.reddit.com/submit?url=<?php echo $current_page_url ?>" target="_blank" title="Share Current Page on Reddit">Reddit</a>
	    <a class="dropdown-item" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_page_url ?>" target="_blank" title="Share Current Page on LinkedIn">LinkedIn</a>
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="mailto:?subject=Have%20a%20look%20at%20this%20Address&body=<?php echo $current_page_url ?>" target="_blank" title="Email Current Page to a Friend">Email</a>
        <a class="dropdown-item" href="javascript:;" onclick="window.print()" target="_blank" title="Print Current Page">Print</a>
       </div>
     </li>	  
	  
	 <li class="nav-item dropdown">
	 <?php if($page_type != 'title'){ ?>
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Navigation
      </a>
	 <?php } ?>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">	<?php

if($page_type=='title')
{
}

elseif($page_type=='serp')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
}

elseif($page_type=='about')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='vision')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='policy')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='terms')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='contact')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
}

elseif($page_type=='dmca')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='masthead')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='developer')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='cora')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='reportbug')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='hac')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='rbl')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='join_hands')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='siteversion')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='dbversion')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='donate')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

elseif($page_type=='disclaimer')
{
echo"\n       <a class=\"dropdown-item\" href=\"$site_root\" title=\"Go to baebom Search\">Home</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/about\" title=\"About baebom\">About</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/vision\" title=\"Our Vision\">Vision</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/policy\" title=\"Policy\">Policy</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/terms\" title=\"Terms of Use\">Terms</a>\n";
echo"\n       <a class=\"dropdown-item\" href=\"$site_root/contact\" title=\"Contact Us\">Contact</a>\n";
}

echo"       </div>\n";
echo"     </li>\n";

	  ?>

    </ul>
  </div>
</nav>