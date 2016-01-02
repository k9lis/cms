<?php

// парсить от "contact":{"icq":0,"skype":"","email":" до первой "
/*
http://job42.ru/vacancy?state%5B%5D=1&state%5B%5D=4&average_salary=1&city_id%5B%5D=573&limit=25&categories_facets=1
http://job42.ru/vacancy?state%5B%5D=1&state%5B%5D=4&average_salary=1&city_id%5B%5D=573&limit=25&offset=25&categories_facets=1
http://job42.ru/vacancy?state%5B%5D=1&state%5B%5D=4&average_salary=1&city_id%5B%5D=573&limit=25&offset=50&categories_facets=1
http://job42.ru/vacancy?state%5B%5D=1&state%5B%5D=4&average_salary=1&city_id%5B%5D=573&limit=25&offset=75&categories_facets=1
http://job42.ru/vacancy?state%5B%5D=1&state%5B%5D=4&average_salary=1&city_id%5B%5D=573&limit=25&offset=950&categories_facets=1	
*//*
$x=0;
while ($x<950)
{
$x = $x + 25; // Увеличение счетчика
$url = "http://job42.ru/vacancy?state%5B%5D=1&state%5B%5D=4&average_salary=1&city_id%5B%5D=573&limit=25&offset=".$x."&categories_facets=1";
echo "search".$x;


// получаем Web-страницу с новостью
// переменная $u содержит URL страницы
$f=join('<BR>', file($url));							
// начало новости
$start = "\"email\":";
$begin=strpos(strtolower($f), '<html>', 0);			
// конец новости
$end=strpos(strtolower($f), '</html>', $begin);
// вырезаем то, что нам нужно - текст новости
$txt=substr($f, $begin, $end-$begin);

// некоторые сайты используют кодировку KOI8-R, поэтому
// данная строка может понадобиться для перекодирования из KOI8-R
// в windows-1251
// $txt = convert_cyr_string($txt,"k","w");
// удаляем все теги, кроме <p> и <img>
$txt = strip_tags($txt, '<p><img>');
// выводим текст новости
echo "<br>SUKA ".$txt;


     $urls = $txt;



	 $w=fopen('01mailis'.$x.'.txt','w'); // 6

fwrite($w,$txt);  // 7

fclose($w);  // 8

     
}
/*

     // Запрашиваем страницу по сформированному url, сохраняем в $str

     $str =  strstr(strip_tags (file_get_contents($url, false, $context)), "@");

     // Выводим страницу для просмотра в браузере

     print $str;

     // С помощью регулярного выражения из загруженной страницы ищем "@"

     // и заносим сам e-mail в массив

     preg_match_all("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*",$str,$matches); // восстановить слешь у звездочки

     $urls[] = $matches[0];




     // Пишем результат в файл

     $fb = fopen('mail'.$x.'.txt', 'write');

     // Делаем разделителем запятую

     fwrite($fb, implode(",",$urls[0]));

     

      echo file_get_contents('$url');  
}
//------------------------

*/
function mail_send($param){


$name = "Резюме на вакансию";

$phone = '8-904-967-62-44';

$mail_end = $param;

  $title = $name; 

        $mess =  "

Здраствуйте, меня заинтересовала ваша вакансия, хотел бы попасть на собеседование, если данная вакансия уже не актуальна, готов рассмотреть другие предложения.

Мое резюме:
ФИО Ожерельев Валерий Александрович
Дата и место рождения: 03.10.1994 г. Новокузнецк
Адрес проживания: г. Новокузнецк, ул. Петракова 64-40.

Контакты:
Эл. адрес: fantomskazochnik@gmail.com
Телефон: +7-904-967-6244 (Звонить желательно с 13:00 до 21:00)

Образование:
1.                  2010-2013 ГОУ НПО «Профессиональный лицей №21», Оператор ЭВМ.
2.                  2014 ГОУ СПО «Профессиональный колледж г. Новокузнецка», Курсы системного администрирования.
3.                  2014-2016 ГОУ СПО «Профессиональный колледж г. Новокузнецка», Программирование в компьютерных системах.

Дополнительная информация:

Знание ПК:
 Продвинутый пользователь. Семейство ОС Microsoft Windows, Linux Ubuntu/Kubuntu/Debian, офисный пакет MS Office (Word, Excel, PowerPoint, Access), Adobe Photoshop, PHP, HTML, CSS, навыки кроссбраузерной  верстки, наполнения контентом и администрирования сайтов, настройка и администрирование локальных сетей, настройка роутеров, установка, восстановление, перереустановка и администрирование ОС семейства Windows.

Опыт работы:
Системный администратор, оператор тех. поддержки, оператор ПК, веб-разработчик, веб-дизайнер, верстальщик, выкладчик товара, мастер по ремонту пк (ремонт, диагностика, работа с клиентами).
Личные качества: Высокая обучаемость, ответственность, коммуникабельность, целеустремлённость, стрессоустойчивость.
Семейное положение: Холост.
Дети: Сын, 2 года.
    ";

        // $to - кому отправляем 

        $to = $param; 

        // $from - от кого 

        $from='fantomskazochnika@gmail.com'; 

        // функция, которая отправляет наше письмо. 

       $result = mail($to, $title, $mess, 'From:'.$from); 

        

            if ($result){ 

        echo "<br>Cообщение успешно отправленно.".$param;

    }

    else{

        echo "<p><br>Cообщение не отправленно. Пожалуйста, попрбуйте еще раз</p>";

    }

}



for ($x=0; $x++<10;){
mail_send("p113@maria-ra.ru");
mail_send("p38@maria-ra.ru");
mail_send("sorokina@kazanova.biz");
mail_send("oaoprofexpert@yandex.ru");
mail_send("MoshkovaAV@kej.uralsib.ru");
mail_send("nic.job@mail.ru");
mail_send("ins@officeplus.ru");
mail_send("kadry@kuzmash.com");
mail_send("av.gavrilenko@altay-skazka.ru");
mail_send("happybabynk@mail.ru");
mail_send("nvk@federalnoe.com");
mail_send("kadr@citymall-nk.ru");
mail_send("urieva.aa@kamss.net");
mail_send("voronkova-t@yandex.ru");
mail_send("person.manager@i-complex.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("Ohina@yandex.ru");
mail_send("uskov_a_s@mail.ru");
mail_send("opt-info@mail.ru");
mail_send("also.razina@mail.ru");
mail_send("advard_ex@mail.ru");
mail_send("beseduk@mail.ru");
mail_send("trade.nvkz@dveri-nk.ru");
mail_send("sch55.nvkz@mail.ru");
mail_send("bnmm@rambler.ru");
mail_send("rb01.42nkz@gmail.com");
mail_send("sibpt@yandex.ru");
mail_send("osha@com.kuzbassenergo.ru");
mail_send("school92nov@yandex.ru");
mail_send("personal@region-lk.ru");
mail_send("kucenko_t@rusklimat.ru");
mail_send("o.svetlichnaya@sibset-team.ru");
mail_send("marketing@vkysno.su");
mail_send("shop-mama@mail.ru");
mail_send("an-lux@mail.ru");
mail_send("Kadry.bk@mail.ru");
mail_send("rabota_5@mail.ru");
mail_send("s.r.katya@rambler.ru");
mail_send("manager.met27@oktex.su");
mail_send("tehnolog.met27@gmail.com");
mail_send("iqmedhr@mail.ru");
mail_send("krasota1983a@mail.ru");
mail_send("info@nevainstrument.ru");
mail_send("Irina.Titanakova@novokuznetsk.sns.ru");
mail_send("rabotakuzbass@megafon.ru");
mail_send("balyk69@mail.ru");
mail_send("rabota_sib@maxus.ru");
mail_send("tradizia-nk@mail.ru");
mail_send("Chts2012@mail.ru");
mail_send("job@sovcombank.ru");
mail_send("photon.nvkz@gmail.com");
mail_send("metaprom-news@yandex.ru");
mail_send("pitkyanen.78@list.ru");
mail_send("evseeva.a.a@avtomir.ru");
mail_send("noa-nvkz@bk.ru");
mail_send("lbpersonal@bk.ru");
mail_send("kedrovka-spa@mail.ru");
mail_send("marketing@vkysno.su");
mail_send("shatohina_sm@bf-nk.ru");
mail_send("rabota@msto.ru");
mail_send("nvk@victoryco.ru");
mail_send("60-91-15@mail.ru");
mail_send("ink@pivnoydvor.com");
mail_send("vremya.ned@yandex.ru");
mail_send("agra_nk@septima.ru");
mail_send("Nkz_hrm@contlog.ru");
mail_send("gaudi-7@mail.ru");
mail_send("atlantadent@mail.ru");
mail_send("springngs@ngs.ru");
mail_send("personal@kuzprof.ru");
mail_send("murzina-as@kuzprof.ru");
mail_send("rabota@tktransugol.com");
mail_send("p44@maria-ra.ru");
mail_send("v.nesterova@sibset-team.ru");
mail_send("valia0405@mail.ru");
mail_send("savelevairina0909@yandex.ru");
mail_send("e.golovaneva@goodline.info");
mail_send("m.tischenko@goodline.info");
mail_send("mms13121984@yandex.ru");
mail_send("holod.personal@mail.ru");
mail_send("family_kadr@list.ru");
mail_send("info@skidka.me");
mail_send("YurchenkoEV@ludidela.ru");
mail_send("parshikovaer@LudiDela.ru");
mail_send("ira1400@yandex.ru");
mail_send("office-sibsh@mail.ru");
mail_send("dmitrey30@mail.ru");
mail_send("n718051@yandex.ru");
mail_send("89505769110@mail.ru");
mail_send("peu@nvk.food-master.ru");
mail_send("ot-kadrov@bk.ru");
mail_send("maev@nvk.food-master.ru");
mail_send("ot-kadrov@bk.ru");
mail_send("ast@food-master.ru");
mail_send("kmsd-personal@mail.ru");
mail_send("gdsht@mail.ru");
mail_send("resume@kkt-nk.ru");
mail_send("mebel-kadr@mail.ru");
mail_send("opp-nk@mail.ru");
mail_send("N.Konuhova@inrusinvest.com");
mail_send("vika_t_88@mail.ru");
mail_send("office@vdk.ru");
mail_send("hr42@fancy-fox.ru");
mail_send("manager@sibcirulnik.ru");
mail_send("hr42@fancy-fox.ru");
mail_send("job@promradiator.com");
mail_send("hr42@fancy-fox.ru");
mail_send("job@promradiator.com");;
mail_send("vacancy@guberniya.com");
mail_send("info@guberniya.com");
mail_send("270965@mail.ru");
mail_send("vacancy@prom-energo.net");
mail_send("shabalina-plast@yandex.ru");
mail_send("lad-dva@mail.ru");
mail_send("personal@chokolate.su");
mail_send("churkin-sg@mail.ru");
mail_send("rolik911@yandex.ru");
mail_send("n718051@yandex.ru");
mail_send("rolik911@yandex.ru");
mail_send("tpktriumf2013@yandex.ru");
mail_send("ralexse@yandex.ru");
mail_send("cv-novokuznetsk@leroymerlin.ru");
mail_send("NValishevskaya@o-stin.ru");
mail_send("Olga.Goyzman@megafon-retail.ru");
mail_send("i.o.medvedev@hcsds.ru");
mail_send("tenitskaya@mail.ru");
mail_send("Tenitskaya@mail.ru");
mail_send("elektromarket-prk@mail.ru");
mail_send("region-siberia@sta-ek.ru");
mail_send("euro3373@mail.ru");
mail_send("vacuclub@yandex.ru");
mail_send("ariant@kfw.ru");
mail_send("klakson-job@yandex.ru");
mail_send("ror@atms-zs.ru");
mail_send("kubareva.anastasiya1985@mail.ru");
mail_send("polina-hr@yandex.ru");
mail_send("osinceva@atletik.su");
mail_send("kvashnina-dv@novolex.ru");
mail_send("a.popov@tdgigant.ru");
mail_send("lena8043@yandex.ru");
mail_send("iqmedhr@mail.ru");
mail_send("garantrf@mail.ru");
mail_send("a.popov@tdgigant.ru");
mail_send("z9234658290@gmail.com");
mail_send("vesta_nvkz@mail.ru");
mail_send("esudina@nkz.sang.ru");
mail_send("mdoy227@mail.ru");
mail_send("bar-france@mail.ru");
mail_send("info@promradiator.com");
mail_send("job@promradiator.com");
mail_send("z9234658290@gmail.com");
mail_send("Centeraz@bk.ru");
mail_send("89134201319@mail.ru");
mail_send("p56@maria-ra.ru");
mail_send("uragan-nk@mail.ru");
mail_send("p56@maria-ra.ru");
mail_send("rabota@nvkz.2gis.ru");
mail_send("o.balisheva@nvkz.2gis.ru");
mail_send("Tkachenko.A@fintechn.ru");
mail_send("Oxana.Reshotkina@tele2.ru");
mail_send("trizschool-13@yandex.ru");
mail_send("eskerov700@gmail.com");
mail_send("eskerov700@gmail.com");
mail_send("TrishaKNP@mail.ru");
mail_send("an-agree@yandex.ru");
mail_send("op@raznotorg.info");
mail_send("info@crockid.ru");
mail_send("projectfive@mail.ru");
mail_send("info@azterra.ru");
mail_send("voitkova@ubrr.ru");
mail_send("projectfive@mail.ru");
mail_send("kuz-vostok-ohrana@bk.ru");
mail_send("personal@snegorod.ru");
mail_send("strazh.nvkz@gmail.com");
mail_send("besprovodjob@mail.ru");
mail_send("okdir@santec-nk.ru");
mail_send("Squall_kemerovo@mail.ru");
mail_send("Inna.Sosnovskaya@evraz.com");
mail_send("hr-podorognik@mail.ru");
mail_send("slastenind@mail.ru");
mail_send("kadry@kuzmash.com");
mail_send("tk-avtoritet@yandex.ru");
mail_send("autoplus.pro@mail.ru");
mail_send("metallmaster22@mail.ru");
mail_send("sladkaya3110@mail.ru");
mail_send("mailhomy@mail.ru");
mail_send("shatohina_sm@bf-nk.ru");
mail_send("mari.alt22@mail.ru");
mail_send("ink@pivnoydvor.com");
mail_send("p113@maria-ra.ru");
mail_send("p113@maria-ra.ru");
mail_send("info@avtogen-t.ru");
mail_send("family_kadr@list.ru");
mail_send("personal@logos-group.ru");
mail_send("rabota@taximaxim.ru");
mail_send("kazachk-anna@rambler.ru");
mail_send("kushnerlv@volcov.ru");
mail_send("master-nk@bk.ru");
mail_send("plotnik3006@yandex.ru");
mail_send("nf@omskgofra.ru");
mail_send("steklonvkz@mail.ru");
mail_send("manhattan_nk@mail.ru");
mail_send("glspp@pdengi.ru");
mail_send("personal@medgarant42.ru");
mail_send("kadr@shtof-alco.ru");
mail_send("rkhisamutdinov@evyap.ru");
mail_send("borabora.nkz@gmail.com");
mail_send("1111@mail.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("Tander_novosibirsk@mail.ru");
mail_send("Tander_novosibirsk@mail.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("tretyakova_n_i@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("tretyakova_n_i@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("Tander_novosibirsk@mail.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("Tander_novosibirsk@mail.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("vacancy_novokuznetsk@novokuznetsk.magnit.ru");
mail_send("personal.sibmining@mail.ru");
mail_send("personal.maining@mail.ru");
mail_send("personal.maining@mail.ru");
mail_send("personal.maining@mail.ru");
mail_send("personal.sibmining@mail.ru");
mail_send("personal.maining@mail.ru");
mail_send("personal.sibmining@mail.ru");
mail_send("personal.maining@mail.ru");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("Sibelectro-OK@yandex.ru");
mail_send("sanarovalv@ksht-mining.com");
mail_send("sanarovalv@ksht-mining.com");
mail_send("hohol_nikola@mail.ru");
mail_send("denisov.sa@esystem42.ru");
mail_send("astahovsv@rambler.ru");
mail_send("manager.sibalyans.nk@mail.ru");
mail_send("surovceva63@mail.ru");
mail_send("etalon_nk@list.ru");
mail_send("marketing@vkysno.su");
mail_send("strazh.nvkz@gmail.com");
mail_send("personal@vdk.ru");
mail_send("hr42@fancy-fox.ru");
mail_send("tzn42ok@mail.ru");
mail_send("3843666666@taximaxim.ru");
mail_send("trayde93@mail.ru");
mail_send("komlev@kep.su");
mail_send("hr@stratosoft.ru");
mail_send("Hohrina_ei@ke.mrsks.ru");
mail_send("job@promradiator.com");
mail_send("sibgdk@inbox.ru");
mail_send("sibgdk@inbox.ru");
mail_send("sibgdk@inbox.ru");
mail_send("sibgdk@inbox.ru");
mail_send("office@lgorod.com");
mail_send("mvshiltseva@yandex.ru");
mail_send("ktpp-of@mail.ru");
mail_send("stogar08@bk.ru");
mail_send("sea@kamennoff.ru");
mail_send("OILUIK@list.ru");
mail_send("tpk@s-kom.org");
mail_send("d.jikharev@nvkz.pc-mail.ru");
mail_send("z9234642550@gmail.com");
mail_send("dasheverdina95@mail.ru");
mail_send("mail@air-link.net");
mail_send("maximova-aliof@yandex.ru");
mail_send("ojigova_i@mail.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("LAZ-ALEKS@mail.ru");
mail_send("Alisaz18@mail.ru");
mail_send("eskerov700@gmail.com");
mail_send("rabota@st-project.com");
mail_send("89609096655@mail.ru");
mail_send("vash.sowetnick@yandex.ru");
mail_send("personal2@novosibirsk.russvet.ru");
mail_send("kadry.russdom@mail.ru");
mail_send("kadry.russdom@mail.ru");
mail_send("kadry.russdom@mail.ru");
mail_send("kadry.russdom@mail.ru");
mail_send("kadry.russdom@mail.ru");
mail_send("kadry.russdom@mail.ru");
mail_send("Atsvetkova@sportmaster.ru");
mail_send("LPolovinko@sportmaster.ru");
mail_send("Atsvetkova@sportmaster.ru");
mail_send("skidanova.ys@spk-styk.ru");
mail_send("opashkovskay@rsb.ru");
mail_send("dir@smmcenter.ru");
mail_send("office-sibsh@mail.ru");
mail_send("270965@mail.ru");
mail_send("om.vvk.novokuz@gmail.com");
mail_send("profi@rdtc.ru");
mail_send("unit-prom@ya.ru");
mail_send("boss@letisnami.ru");
mail_send("Pshzyt@mail.ru");
mail_send("nvk@magazinznaniy.ru");
mail_send("Evromoda2015@yandex.ru");
mail_send("orehova_vak@mail.ru");
mail_send("miloslava@ngs.ru");
mail_send("masterok_m@mail.ru");
mail_send("tshina.ru@yandex.ru");
mail_send("razrez-ok@mail.ru");
mail_send("orehova_vak@mail.ru");
mail_send("orehova_vak@mail.ru");
mail_send("konjuchenko@akb22.ru");
mail_send("tshina.ru@yandex.ru");
mail_send("lialka.73@mail.ru");
mail_send("e.golovaneva@goodline.info");
mail_send("tihonovauu@bungur.ru");
mail_send("gorbunova@stlog.ru");
mail_send("kutergin.nvkz@gmail.com");
mail_send("mrd_nvkz@mail.ru");
mail_send("sdv_75@mail.ru");
mail_send("ok-ngtk@yandex.ru");
mail_send("hr.aldi@mail.ru");
mail_send("maksim42rus@gmail.com");
mail_send("aleks_kray@mail.ru");
mail_send("info@molskaz42.ru");
mail_send("antx@bk.ru");
mail_send("r.tuzikov@sttshina.ru");
mail_send("gruzov55@mail.ru");
mail_send("ariant@kfw.ru");
mail_send("Cakecafe.ru@gmail.com");
mail_send("Cakecafe.ru@gmail.com");
mail_send("mp-opt-54@mail.ru");
mail_send("dorogova_viktori@mail.ru");
mail_send("driver_nvk@mail.ru");
mail_send("nnnatik@mail.ru");
mail_send("hr@tensor.ru");
mail_send("kravchenko-1965@mail.ru");
mail_send("yuliya.zdor@rezidorparkinn.com");
mail_send("t.getman@farmaimpex.ru");
mail_send("Mikhalap.D@yandex.ru");
mail_send("sibniistrom@gmail.com");
mail_send("nzpm.nk@mail.ru");
mail_send("ariant@kfw.ru");
mail_send("masloff-resto@mail.ru");
mail_send("e.tokareva@trace-family.ru");
mail_send("ariant@kfw.ru");
mail_send("ariant@kfw.ru");
mail_send("rabota@tktransugol.com");
mail_send("adk_nsk@mail.ru");
mail_send("mr.prok@mail.ru");
mail_send("stepan.info@mail.ru");
mail_send("podbor-sb@mail.ru");
mail_send("ermolhr@rambler.ru");
mail_send("kadry@kuzmash.com");
mail_send("kadry@kuzmash.com");
mail_send("rabota@tktransugol.com");
mail_send("technoarsenal@mail.ru");
mail_send("lenina-58@mail.ru");
mail_send("kadry@kuzmash.com");
mail_send("buterbrodoff@inbox.ru");
mail_send("natalya.kalinina.1981@list.ru");
mail_send("nsk54k@yandex.ru");
mail_send("manager-nkz@sterh.ru");
mail_send("kluch3-00@mail.ru");
mail_send("ira.yazykova.94@mail.ru");
mail_send("abelikova@monetka.ru");
mail_send("mednikova-k@mail.ru");
mail_send("sibstomcom@yandex.ru");
mail_send("info@auris.pro");
mail_send("vip.widan@mail.ru");
mail_send("natasha_gett@mail.ru");
mail_send("9130707760@mail.ru");
mail_send("ajt25@mail.ru");
mail_send("schol-19nkz@mail.ru");
mail_send("sites.rabota@gmail.com");
mail_send("personal@logos-group.ru");
mail_send("inform@linxx.pro");
mail_send("sps-potolok@mail.ru");
mail_send("buh.ztt@list.ru");
mail_send("buh.ztt@list.ru");
mail_send("askmebel@mail.ru");
mail_send("alex-tishenko88@mail.ru");
mail_send("info@molskaz42.ru");
mail_send("kmr-len-kadr@novex-trade.ru");
mail_send("vacuclub@yandex.ru");
mail_send("novikov1111@gmail.com");
mail_send("kirillicus@mail.ru");
mail_send("toporov.sibir@mail.ru");
mail_send("olg16071962@yandex.ru");
mail_send("shukshina_yv@domocentr.ru");
mail_send("Personnel@ru.becker-mining.com");
mail_send("Personnel@ru.becker-mining.com");
mail_send("Julia.Bashurova@ru.becker-mining.com");
mail_send("cko-sb@mail.ru");
mail_send("v.v.mochalov@mail.ru");
mail_send("p56@maria-ra.ru");
mail_send("kadr-nvk@kvadroplus.com");
mail_send("service4@prom-energo.net");
mail_send("Nwkznatasha@mail.ru");
mail_send("Nwkznatasha@mail.ru");
mail_send("tm@likee.ru");
mail_send("restikuz@rambler.ru");
mail_send("yurank@inbox.ru");
mail_send("8002@9569242.ru");
mail_send("vr386325@mail.ru");
mail_send("lysikova@nvkz.kkc.ru");
mail_send("kadr-pkf@mail.ru");
mail_send("georgeva93@mail.ru");
mail_send("manager@web-axioma.ru");
mail_send("ok.kem@mail.ru");
mail_send("Olga.M.Popovav@sibir.rt.ru");
mail_send("mdou251@mail.ru");
mail_send("p113@maria-ra.ru");
mail_send("p113@maria-ra.ru");
mail_send("p113@maria-ra.ru");
mail_send("p113@maria-ra.ru");
mail_send("p38@maria-ra.ru");
mail_send("preventivan@yandex.ru");
mail_send("p38@maria-ra.ru");
mail_send("p38@maria-ra.ru");
mail_send("odel@tmn.monetka.ru");
mail_send("sorokina@kazanova.biz");
mail_send("oaoprofexpert@yandex.ru");
mail_send("MoshkovaAV@kej.uralsib.ru");
mail_send("nic.job@mail.ru");
mail_send("ins@officeplus.ru");
mail_send("kadry@kuzmash.com");
mail_send("av.gavrilenko@altay-skazka.ru");
mail_send("happybabynk@mail.ru");
mail_send("nvk@federalnoe.com");
mail_send("kadr@citymall-nk.ru");
mail_send("urieva.aa@kamss.net");
mail_send("voronkova-t@yandex.ru");
mail_send("person.manager@i-complex.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("Ohina@yandex.ru");
mail_send("uskov_a_s@mail.ru");
mail_send("opt-info@mail.ru");
mail_send("klimat-kontrol@list.ru");
mail_send("klimat-kontrol@list.ru");
mail_send("shalamov@alekon.org");
mail_send("p56@maria-ra.ru");
mail_send("p56@maria-ra.ru");
mail_send("personal@mir-piva.com");
mail_send("kemgrand@mail.ru");
mail_send("svir-ir@mail.ru");
mail_send("advard_ex@mail.ru");
mail_send("advard_ex@mail.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("p56@maria-ra.ru");
mail_send("p56@maria-ra.ru");
mail_send("gbgu@mail.ru");
mail_send("matveenko.v@mail.ru");
mail_send("p44@maria-ra.ru");
mail_send("brend-42@yandex.ru");
mail_send("ksa@sibnk.ru");
mail_send("olga.kozban@mcd-gid.ru");
mail_send("pem100@mail.ru");
mail_send("pem100@mail.ru");
mail_send("pem_749@mail.ru");
mail_send("pem100@mail.ru");
mail_send("pem100@mail.ru");
mail_send("pem_749@mail.ru");
mail_send("pem_749@mail.ru");
mail_send("pem100@mail.ru");
mail_send("pem100@mail.ru");
mail_send("pem_749@mail.ru");
mail_send("sale@kuznedser.ru");
mail_send("manager@web-axioma.ru");
mail_send("manager@web-axioma.ru");
mail_send("austaff2014@yandex.ru");
mail_send("rabota@600654.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("rus_nvk_mgr@tjc.ru");
mail_send("info@rusdom-nk.ru");
mail_send("novtrend@mail.ru");
mail_send("manager.sibalyans.nk@mail.ru");
mail_send("texno717@mail.ru");
mail_send("alexanderk85@yandex.ru");
mail_send("evseeva.a.a@avtomir.ru");
mail_send("60-91-15@mail.ru");
mail_send("v.dikaev@zs.ttk.ru");
mail_send("k.s.v1975@mail.ru");
mail_send("lazurit42@mail.ru");
mail_send("r.kolobaev@vittomebel.ru");
mail_send("maev@nvk.food-master.ru");
mail_send("shev.artem42@mail.ru");
mail_send("o.kumova@ks-international.ru");
mail_send("an.elena22.01@mail.ru");
mail_send("pvhkadr@mail.ru");
mail_send("avtoreg@mail.ru");
mail_send("sib_kluchi@mail.ru");
mail_send("stroymash84@mail.ru");
mail_send("Cleverpub_nvkz@mail.ru");
mail_send("restikuz@rambler.ru");
mail_send("trade.nvkz@dveri-nk.ru");
mail_send("kluchkovskoy.nvk@bdcgroup.ru");
mail_send("personal@serve-it.ru");
mail_send("personal@serve-it.ru");
mail_send("personal@serve-it.ru");
mail_send("info@serve-it.ru");
mail_send("personal@serve-it.ru");
mail_send("chopregion@mail.ru");
mail_send("personal@km-group.ru");
mail_send("ksenyir@mail.ru");
mail_send("ooo-dtm@yandex.ru");
mail_send("info@klubnichkashop.ru");
mail_send("kuzbassanna@mail.ru");
mail_send("gangster2mafia@gmail.com");
mail_send("lrg62@mail.ru");
mail_send("shorif@bk.ru");
mail_send("vitalyigein@gmail.com");
mail_send("diogen21@mail.ru");
mail_send("hs-istoki@bk.ru");
mail_send("a.ivanova@bogorodskie.ru");
mail_send("m.shamanaeva@instrument.ru");
mail_send("GK@apogee-centre.ru");
mail_send("kadr@grins.ru");
mail_send("kkrasnokutskiy@tpm.ru");
mail_send("kadr@grins.ru");
mail_send("Nkz_hrm@contlog.ru");
mail_send("E.loyko@list.ru");
mail_send("tkachenkoolechka5@gmail.com");
mail_send("kamin_nk@mail.ru");
mail_send("avior-nk@mail.ru");
mail_send("Anzhelika.Mazeina@evraz.com");
mail_send("sales@toolpoint.club");
mail_send("332529@mail.ru");
mail_send("planar.nk@mail.ru");
mail_send("masloff-resto@mail.ru");
mail_send("info@molskaz42.ru");
mail_send("info@molskaz42.ru");
mail_send("fedotovsi@gmail.com");
mail_send("arf2005@yandex.ru");
mail_send("Nkz_hrm@contlog.ru");
mail_send("nk@aplus24.ru");
mail_send("kindergarden193@mail.ru");
mail_send("atlantadent@mail.ru");
mail_send("tatyana.gavrilenko@homecredit.ru");
mail_send("nastanisimo@yandex.ru");
mail_send("79095147785@yandex.ru");
mail_send("evgenia.yudina@mail.ru");
mail_send("savage2@mail.ru");
mail_send("tatiya_678@mail.ru");
mail_send("edos_nvk@mail.ru");
mail_send("avarkom911alfa@yandex.ru");
mail_send("glavstroy-nk@yandex.ru");
mail_send("rinha@mail.ru");
mail_send("domfest@bk.ru");
mail_send("assvar@mail.ru");
mail_send("p56@maria-ra.ru");
mail_send("job@pusan-mebel.ru");
mail_send("firmachak@rambler.ru");
mail_send("asudjenskkkmserv@rambler.ru");
mail_send("tk-nikos@mail.ru");
mail_send("domplus@mail.ru");
mail_send("balyk69@mail.ru");
mail_send("E.Babushkin@cdek.ru");
mail_send("elko-nk@mail.ru");
mail_send("job@cwc.ru");
mail_send("job@onesystems.ru");
mail_send("kadry@kuzmash.com");
mail_send("Ytknastya@mail.ru");
mail_send("krk.com@inbox.ru");
mail_send("fedotova_75@list.ru");
mail_send("nk@4geo.ru");
mail_send("sibdom2004@yandex.ru");
mail_send("yuliya.zdor@rezidorparkinn.com");
mail_send("tapetti.personal@gmail.com");
mail_send("Nataliya.Chursina@Vestich.ru");
mail_send("mari831@ngs.ru");
mail_send("sin_pro@mail.ru");
mail_send("topkadry@inbox.lv");
mail_send("incomnn@yandex.ru");
mail_send("vilisova-ms@pridonie.ru");
mail_send("r2008@mail.ru");
mail_send("fabrika-status@mail.ru");
mail_send("sibsad-pitomnik@mail.ru");
mail_send("p56@maria-ra.ru");
mail_send("elcondor19@mail.ru");
mail_send("4619797@gmail.com");
mail_send("zim_nk@list.ru");
mail_send("chechurin-in@mail.ru");
mail_send("yuliya.zdor@rezidorparkinn.com");
mail_send("man@3abey.ru");
mail_send("zamyatina.ma@zsugol.ru");
mail_send("bastion-nk@yandex.ru");
mail_send("evk42@yandex.ru");
mail_send("tk-avtoritet@yandex.ru");
mail_send("arc42@mail.ru");
mail_send("golovina_o@ormatek.com");
mail_send("Personnel@ru.becker-mining.com");
mail_send("tdtrikot@yandex.ru");
mail_send("ink@pivnoydvor.com");
mail_send("domashnee-rukodelie@yandex.ru");
mail_send("smk.8181@mail.ru");
mail_send("kevv2011@gmail.com");
mail_send("poakonit@gmail.com");
mail_send("gira_663@mail.ru");
mail_send("job@areffect.ru");
mail_send("personal@aspekt-nk.ru");
mail_send("an-lux@mail.ru");
mail_send("promprof_nk@mail.ru");
mail_send("mvpopov@mail.ru");
mail_send("kuzmarket42@yandex.ru");
mail_send("Darya.Yarmomedova@cetelem.ru");
mail_send("info_nvk@t-d.ru");
mail_send("zhanna.kovach@gkm.ru");
mail_send("sofja_podstavkina@kemerovo.rgs.ru");
mail_send("donbuketon@mail.ru");
mail_send("schekotikhina.tatyana@corum.com");
mail_send("ometeleva@detmir.ru");
mail_send("74.anna@mail.ru");
mail_send("sp_kadr2@elis.ru");
mail_send("shina-42@yandex.ru");
mail_send("otchet.sfo@rosvois.ru");
mail_send("hr.rodex@mail.ru");
mail_send("Evgeniy.Beloborodov@kellogg.com");
mail_send("job@it-go.ru");
mail_send("bardina@nec.kuz.ru");
mail_send("bardina@nec.kuz.ru");
mail_send("dorofeevnk@ngs.ru");
mail_send("tex@nk-teks.ru");
mail_send("prodbuh219@mail.ru");
mail_send("ok@pivnoydvor.com");
mail_send("zim_nk@list.ru");
mail_send("zim_nk@list.ru");
mail_send("olga@tkregion42.com");
mail_send("pechatnik-nkz@narod.ru");
mail_send("s.telegin@air-link.net");
mail_send("grupapodbora@mail.ru");
mail_send("abris-nk@rambler.ru");
mail_send("okpatp-1@mail.ru");
mail_send("nk-sladosti@mail.ru");
mail_send("natpol_rabota@mail.ru");
mail_send("weselo5@mail.ru");
mail_send("marketing@vkysno.su");
mail_send("aakolokolnikova@yandex.ru");
mail_send("avtomir-nk@mail.ru");
mail_send("kuhnynk@mail.ru");
mail_send("f.a.v84@yandex.ru");
mail_send("bolt1907@mail.ru");
mail_send("yu.gorshkova@cloud.com");
mail_send("nikitten@mail.ru");
mail_send("abelikova@monetka.ru");
mail_send("sergey_sem82@list.ru");
mail_send("aquamax-moika@yandex.ru");
mail_send("yuliya.zdor@rezidorparkinn.com");
mail_send("uda85@mail.ru");
mail_send("evk42@yandex.ru");
mail_send("mdoy_233@mail.ru");
mail_send("opodarueva@tmn.monetka.ru");
mail_send("odel@tmn.monetka.ru");
mail_send("opodarueva@tmn.monetka.ru");
mail_send("odel@tmn.monetka.ru");
mail_send("spt-zakup@yandex.ru");
mail_send("elena.ivanovskaya@lenta.com");
mail_send("masloff-resto@mail.ru");
mail_send("ksm@krepy.ru");
mail_send("Nadezhkina.Natalya@zolotoy.ru");
mail_send("Suhonenko-sv@mail.ru");
mail_send("expert42@bk.ru");
mail_send("olga.voronova@rusal.com");
mail_send("fundamentpsk@mail.ru");
mail_send("ukinkom-c@mail.ru");
mail_send("anton.plyushh.88@mail.ru");
mail_send("vashcredit42@gmail.com");
mail_send("Svetlana.Tinkova@evraz.com");
mail_send("mou@kontur42.ru");
mail_send("dirprom1@mail.ru");
mail_send("galinka.nkt@mail.ru");
mail_send("Zhelinskaya.ZV@kmr.gazprom-neft.ru");
mail_send("ok@kfw.ru");
mail_send("ok@kfw.ru");
mail_send("info@str42.ru");
mail_send("y9049965150@gmail.com");
mail_send("ok@kfw.ru");
mail_send("ok@kfw.ru");
mail_send("rabotainplast@yandex.ru");
mail_send("rabotainplast@yandex.ru");
mail_send("pribitkovaio@yandex.ru");
mail_send("takie.dela.55@mail.ru");
mail_send("Torsion89609066545@gmail.com");
mail_send("baby_yana42@mail.ru");
mail_send("zaharova-olya@mail.ru");
mail_send("vipylika-1990@mail.ru");
mail_send("rabota-fingrup15@mail.ru");
mail_send("oz-19-85@mail.ru");
mail_send("bv@sportico.org");
mail_send("stroiprogress42@mail.ru");
mail_send("ruzukova2012@ya.ru");
mail_send("rabotavologda@vk.com");
mail_send("ps42ok@mail.ru");
mail_send("mezencevv.nk@gmail.com");
mail_send("ctt44@mail.ru");
mail_send("Hotel-Lotos@Yandex.ru");
mail_send("info_nvk@t-d.ru");
mail_send("eglitta@mail.ru");
mail_send("3597asd@mail.ru");
mail_send("kvashnina-dv@novolex.ru");
mail_send("evseeva.a.a@avtomir.ru");
mail_send("sknsk154@mail.ru");
mail_send("600767ov@mail.ru");
mail_send("benda.74@mail.ru");
mail_send("sibdom2004@yandex.ru");
mail_send("sibtek-nvkz@mail.ru");
mail_send("nkudrevich@toyota-novokuznetsk.ru");
mail_send("wionaa@mail.ru");
mail_send("info@emigrace.com");
mail_send("mdoy632010@yandex.ru");
mail_send("9039420099@mail.ru");
mail_send("sign.studio@mail.ru");
mail_send("veresova@msk.avnt.ru");
mail_send("a-klevtsova@mail.ru");
mail_send("enigma-el@rambler.ru");
mail_send("k.veresova@mail.ru");
mail_send("Lida.78@mail.ru");
mail_send("N.Konuhova@inrusinvest.com");
mail_send("lansib-n@mail.ru");
mail_send("f.deva70@mail.ru");
mail_send("KPTS95@mail.ru");
mail_send("gmc-socium@mail.ru");
mail_send("p56@maria-ra.ru");
mail_send("zpmk@bk.ru");
mail_send("ok@kfw.ru");
mail_send("sibniistrom@gmail.com");
mail_send("tkn42@bk.ru");
mail_send("personal@ktm.su");
mail_send("personal@ktm.su");
mail_send("Lena.sh_07@mail.ru");
mail_send("sedychenko.ai@zsugol.ru");
mail_send("iprosku@bk.ru");
mail_send("kosi_kn@kpk.su");
mail_send("info@altreza.ru");
}

    ?>