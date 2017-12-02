<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=='Balipost'){
  $url=("http://www.balipost.com/pendidikan");
} elseif($q=="CNN") {
  $url=("https://www.cnnindonesia.com/nasional/indeks/3");
} elseif($q=="Detik") {
  $url=("https://news.detik.com/indeks/all/");
} elseif($q=="Kompas"){
  $url=("https://kompas.id/kategori/dikbud/pendidikan/");
} elseif($q=="Liputan6"){
  $url=("http://www.liputan6.com/rss");
} elseif($q=="PR"){
  $url=("http://www.pikiran-rakyat.com/nasional/");
} elseif($q=="Republika"){
  $url=("http://www.republika.co.id/kanal/news/pendidikan");
} elseif($q=="SM"){
  $url=("http://www.suaramerdeka.com/news/indeks");
} elseif($q=="Tirto"){
  $url=("https://tirto.id/indeks");
} elseif($q=="Tribun"){
  $url=("http://www.tribunnews.com/nasional/pendidikan");
} elseif($q=="Vivanews"){
  $url=("http://www.viva.co.id/berita/nasional");
} elseif($q=="TVOne"){
  $url=("http://iptek.tvone.co.id/rss/news/");
} elseif($q=="Antara"){
  $url=("https://www.antaranews.com/nasional/umum/");
} elseif($q=="VOA"){
  $url=("https://www.voaindonesia.com/z/299?p=3");
}


$kata_kunci = array(
  "menristekdikti",
  "pendidikan",
  "dikti",
  "mahasiswa",
  "pelantikan",
  "rektor",
  "iptek",
  "riset",
  "kemristek",
  "teknologi",
  "kopertis",
  "institut",
  "universitas",
  "akademi",
  "permenristekdikti",
  "pdpt",
  "pusdatin",
  "kemristekdikti",
  "boptn",
  "ppid",
  "lakip",
  "inovasi",
  "perguruan",
  "science",
  "sains",
  "kkni",
  "ppgt",
  "ukt",
  "siswa",
  "kurikulum",
  "dosen",
  "institut",
  "politeknik",
  "dirn",
  "aipi",
  "bppt",
  "lipi",
  "lapan",
  "batan",
  "bapeten",
  "aptisi",
  "ban-pt",
  "cpns",
  "plagiarisme"


);

function strposa($haystack, $needles=array(), $offset=0) {
  $chr = array();
  foreach($needles as $needle) {
    $res = strpos($haystack, $needle, $offset);
    if ($res !== false) $chr[$needle] = $res;
  }
  if(empty($chr)) return false;
  return min($chr);
}

include("simple_html_dom.php");
if($q == "PR"){
  $jml_page = 2;
  for($i=0;$i<=$jml_page;$i++){

    $target_url = "$url?page=$i";
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('h2.entry-title') as $link){
      $titletolower= strtolower($link);
      if(strposa($titletolower, $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "Antara"){
  $jml_page = 2;
  for($i=1;$i<=$jml_page;$i++){

    $target_url = $url.$i;
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('h3.entry-title td-module-title') as $link){
      $titletolower= strtolower($link);
      if(strposa($titletolower, $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "Balipost"){
  $jml_page = 2;
  for($i=1;$i<=$jml_page;$i++){

    $target_url = "$url/page/$i";
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('h3 a') as $link){
      $titletolower= strtolower($link);
      if(strposa(strtolower($link->plaintext), $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "CNN"){
  $jml_page = 2;
  for($i=1;$i<$jml_page;$i++){

    $target_url = $url;
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('article a') as $link){
      $titletolower= strtolower($link);
      if(strposa($titletolower, $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "Detik"){
  $jml_page = 3;
  for($i=1;$i<=$jml_page;$i++){

    $target_url = "$url/$i";
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('article a') as $link){
      $titletolower= strtolower($link);
      if(strposa($titletolower, $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "Kompas"){
  $jml_page = 3;
  for($i=1;$i<=$jml_page;$i++){

    $target_url = "$url/page/$i";
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('h2.article-headline a') as $link){
      $titletolower= strtolower($link);
      if(strposa($titletolower, $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "Republika"){
  // $jml_page = 3;
  // for($i=1;$i<=$jml_page;$i++){

  $target_url = "$url";
  $html = new simple_html_dom();
  $html->load_file($target_url);
  foreach($html->find('div.jdl-ct-a a') as $link){
    $titletolower= strtolower($link);
    if(strposa(strtolower($link->plaintext), $kata_kunci, 1)) {
      echo $link."<br/>";
    }
  }
  // }
}else if($q == "SM"){
  // $jml_page = 3;
  // for($i=1;$i<=$jml_page;$i++){

  $target_url = "$url";
  $html = new simple_html_dom();
  $html->load_file($target_url);
  foreach($html->find('figcaption.news-caption a') as $link){
    $titletolower= strtolower($link);
    if(strposa($titletolower, $kata_kunci, 1)) {
      echo $link."<br/>";
    }
  }
  // }
}else if($q == "Tirto"){
  $jml_page = 3;
  for($i=1;$i<=$jml_page;$i++){

    $target_url = "$url/$i";
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('h4.media-heading a') as $link){
      $titletolower= strtolower($link);
      if(strposa($titletolower, $kata_kunci, 1)) {
        echo $link."<br/>";
      }
    }
  }
}else if($q == "Tribun"){
  // $jml_page = 3;
  // for($i=1;$i<=$jml_page;$i++){

  $target_url = "$url";
  $html = new simple_html_dom();
  $html->load_file($target_url);
  foreach($html->find('div.mr140 a') as $link){
    $titletolower= strtolower($link);
    if(strposa($titletolower, $kata_kunci, 1)) {
      echo $link."<br/>";
    }
  }
  // }
}else if($q == "Vivanews"){
  $target_url = "$url";
  $html = new simple_html_dom();
  $html->load_file($target_url);
  foreach($html->find('div.content_center a.title-content') as $link){
    $titletolower= strtolower($link);
    // if(strposa($titletolower, $kata_kunci, 1)) {
    echo $link."<br/>";
    // }
  }
}else if($q == "VOA"){
  $target_url = "$url";
  $html = new simple_html_dom();
  $html->load_file($target_url);
  foreach($html->find('div.content a') as $link){
    $titletolower= strtolower($link);
    if(strposa($titletolower, $kata_kunci, 1)) {
      echo $link."<br/>";
    }
  }
}

?>
