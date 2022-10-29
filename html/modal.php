<?php
/**
 * @package		plg_editors-xtd_qlloremipsum
 * @copyright	Copyright (C) 2017 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
define('_JEXEC',1);
defined('_JEXEC') or die;
$base = (string)urldecode($_GET['bp']);
function qlloremipsumCleanString($str)
{
    $arrString=preg_split("?\n?",$str);
    $str='<p>'.implode('</p><p>',$arrString).'</p>';
    $str=str_replace("\n",'<br />',$str);
    $str=str_replace("\r",'',$str);
    return $str;
}
?>
<!doctype html>
<html>
<head>
    <title>qlloremipsum Generator</title>
    <link rel="stylesheet" href="<?php echo $modal_css; ?>" />
    <script src="../js/qlloremipsum.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="container">
    <?php $arr=array
    ('Lorem ipsum'=>'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
    'Uns ist in alten maeren'=>'Uns ist in alten maeren      wunders vil geseit
von heleden lobebaeren,   von grôzer arebeit,
von freuden, hôchgezîten,  von weinen und von klagen
von küener recken strîten  muget ir nu wunder hoeren sagen

Uns ist in alten Mären         Wunders viel gesagt
von Helden, lobeshehren,    von Taten, kühn gewagt,
von frohen Festlichkeiten,    von Weinen und von Klagen
von kühner Recken Streiten mögt Ihr nun Wunder hören sagen.',
    'Der Blindtext-Fall'=>'Sie erinnern sich. Der Blindtext-Fall im vorigen Jahr. Nun will Karl noch nach Canossa. Und Claudia heiratet zur Busse Copperfield. Jeden Morgen entzünden sie eine Kerze. Jeden Nachmittag ist eine Runde Rosenkranz fällig. Zur Heiligen Marie. Weil Karl mit dem Zopf der Claudia mit dem Smile optisch nette Koran-Typo aufs Mieder hat sticken lassen. Heiliger Blindtext am Busen.
Bumm. Da läßt der Mullah nicht mit sich scherzen. Blindtext killt Chanel, Islam erklärt Karl den Krieg, das Abendland zittert. Der Blindtext-Fall ist geboren. Die Geschichte des Blindtextes und seiner Texter wird aufgeblättert. Endlich. Was wissen Sie über Blindtext? Katholischen nimmt man für Kochbücher, evangelischen für Bauhausmöbelprospekte, hebräischer wird in Hollywood verfilmt, atheistischer ist für Procter & Gamble Waschmittel, arabischer ist nicht. Und weiter? Zu wem beten Karl und Claudia jeden Tag als Buße für ihre Blindtext-Sünde? Zu ihr. Zur Heiligen Marie Antoinette. Madame ging schön aufs Schafott. Welch eine Haltung. Sie weiß, sie kriegt den Kopf ab. Aber vorher pudert sie ihn noch, beißt sich auf die Lippen von wegen Lippenrot, kneift sich in die Wangen von wegen Wangenrot. Und sie weiß, sie wird den Kopf verlieren. Oben ab. Und es stört die Marie nicht. Diese Haltung verehren die Blindtexter. Du weißt, du wirst gecuttet. Aber du gibst alles. Sainte Marie, steh uns bei. The english call it the holy attitude of SM.
Des Blindtexters Heiliges Tier ist das Schwein. Es atmet und furzt, frißt und säuft, um verwurstet zu werden. Wie ähnlich doch dem Blindtext, der nur entsteht, um zerlegt zu werden. Was sagt der Art Director zu Faust? ... denn alles, was entsteht, ist wert, daß es zugrunde geht ...',
    'Knechts Leben'=>'Mit seiner Aufnahme in die Elite war Knechts Leben auf eine andre Ebene verpflanzt, es war der erste und entscheidende Schritt in seiner Entwicklung geschehen. Es geht durchaus nicht allen Eliteschülern so, daß die amtliche Aufnahme in die Elite mit dem innern Erlebnis der Berufung zusammenfällt. Das ist Gnade, oder wenn man es banal ausdrücken will: es ist ein Glücksfall. Wem er begegnet, dessen Leben hat ein Plus, so wie der ein Plus besitzt, dem ein Glücksfall besonders glückliche Gaben an Leib und See le mitgegeben hat. Die meisten Eliteschüler, ja beinahe alle, empfinden zwar ihre Wahl als ein großes Glück, als eine Auszeichnung, auf die sie stolz sind, und sehr viele von ihnen haben sich auch diese Auszeichnung vorher glühend erwünscht. Aber der Übergang von der gewöhnlichen heimatlichen Schule in die Schulen von Kastalien fällt den meisten Auserwählten dann doch schwerer, als sie gedacht hätten, und bringt manchen unerwartete Enttäuschungen. Vor allem ist der Übergang für alle jene Schüler, die in i hrem Elternhaus glücklich und geliebt waren, ein sehr schwerer Abschied und Verzicht, und so kommt denn auch, namentlich während der beiden ersten Elitejahre, eine nicht unbeträchtliche Zahl von Rückversetzungen vor, deren Grund nicht ein Mangel an Begabung und Fleiß, sondern Unfähigkeit der Schüler ist, sich mit dem Internatsleben und vor allem mit dem Gedanken zu versöhnen, künftig die Verbindung mit Familie und Heimat immer mehr zu lösen und schließlich keine andre Zugehörigkeit mehr zu kennen und zu r espektieren als die zum Orden. Dann gibt es je und je auch Schüler, welchen umgekehrt gerade das Loskommen vom Vaterhaus und von einer ihnen entleideten Schule die Hauptsache bei ihrer Aufnahme in die Elite war; diese, etwa von einem strengen Vater oder einem ihnen unangenehmen Lehrer befreit, atmeten zwar eine Weile auf, hatten sich aber von dem Wechsel so große und unmögliche Veränderungen ihres ganzen Lebens versprochen, daß bald eine Enttäuschung kam. Auch die eigentlichen Streber und Musterschüler, d i! e Pedantischen, konnten sich in Kastalien nicht immer halten; nicht daß sie den Studien nicht wären gewachsen gewesen, aber es kam in der Elite eben nicht allein auf die Studien und Fachzeugnisse an, sondern es wurden auch erzieherische und musische Ziele angestrebt, vor welchen dieser und jener die Waffen streckte. Immerhin war in dem System der vier großen Eliteschulen mit ihren zahlreichen Unterabteilungen und Zweiganstalten Raum für vielerlei Begabungen, und ein strebsamer Mathematiker oder Philologe, wenn er wirklich das Zeug zu einem Gelehrten in sich hatte, brauchte etwa einen Mangel an musikalischer oder philosophischer Begabung nicht als Gefahr zu empfinden. Es gab zuzeiten sogar in Kastalien sehr starke Tendenzen zur Pflege der reinen, nüchternen Fachwissenschaften, und die Vorkämpfer dieser Tendenzen waren nicht nur gegen die „Phantasten“, das heißt gegen die Musikalischen und Musischen, kritisch und spottlustig gestimmt, sondern haben zuzeiten innerhalb ihrer Kreise alles Musische, und namentl ich das Glasperlenspiel, geradezu abgeschworen und verpönt.Da Knechts Leben, soweit es uns bekannt ist, sich ganz in Kastalien abspielte, in jenem stillsten und heitersten Bezirk unseres gebirgigen Landes, den man früher mit einem Ausdruck des Dichters Goethe oft auch „die pädagogische Provinz“ genannt hat, wollen wir in aller Kürze und auf die Gefahr hin, den Leser mit Längstgewußtem zu langweilen, nochmals dies berühmte Kastalien.',);
    ?>
    <h3>qlloremipsum :: Select Span</h3>
    <table>
        <?php while(list($k,$v)=each($arr)):?>
            <tr><td><input type="submit" onclick="qlloremipsum('<?php echo qlloremipsumCleanString($v);?>')" value="<?php echo $k;?>" /></td></tr>
        <?php endwhile;?>
    </table>
</div>
</body>
</html>