var rybenaRepositoryUrl = "http://www.rybena.com.br/RybenaRepository/";
var serverUrl = "http://www.rybena.com.br/RybenaServer/CodeApplication";

var scriptRybenaLoaded = 0;

function rybena(areaRybenaLibras, areaRybenaVoz) {

	jQueryRybena('area.'+areaRybenaLibras)
			.bind(
					"click",
					function() {
						console.log('DOM Loaded (DOMContentLoaded)');
						// $('head').append('<script
						// src='+serverUrl+'></script>');
						if (!scriptRybenaLoaded) {

							jQueryRybena
									.getScript(
											serverUrl,
											function() {
												scriptRybenaLoaded = 1;

												if (document
														.getElementById("loadingDiv") == null) {
													var loadingDiv = document
															.createElement("div");
													loadingDiv.id = "loadingDiv";
													loadingDiv.style.cssText = "width: 120px; height: 120px; position: absolute; top: 0px; left: 120px; z-index:9999;";
												} else {
													var loadingDiv = document
															.getElementById("loadingDiv");
													window.document
															.getElementById("loadingDiv").style.visibility = "visible";

												}

												loadingDiv.innerHTML = "<img width=120 height=120 src='"
														+ rybenaRepositoryUrl
														+ "resource/img/loading.gif'></img>";
												window.document
														.getElementById(
																"rybenaVozDiv")
														.appendChild(loadingDiv);

												load();
												initialize();
												showRybena();

												
											});

							console.log('Log 1');
						} else {
							showRybena();
						}
					});


	jQueryRybena('area.'+areaRybenaVoz)
			.bind(
					"click",
					function() {
						console.log('DOM Loaded (DOMContentLoaded)');
						// $('head').append('<script
						// src='+serverUrl+'></script>');
						if (!scriptRybenaLoaded) {

							jQueryRybena.getScript(
											serverUrl,
											function() {
												scriptRybenaLoaded = 1;

												if (document
														.getElementById("loadingDiv") == null) {
													var loadingDiv = document
															.createElement("div");
													loadingDiv.id = "loadingDiv";
													loadingDiv.style.cssText = "width: 120px; height: 120px; position: absolute; top: 0px; left: 120px; z-index:9999;";
												} else {
													var loadingDiv = document
															.getElementById("loadingDiv");
													window.document
															.getElementById("loadingDiv").style.visibility = "visible";

												}

												loadingDiv.innerHTML = "<img width=120 height=120 src='"
														+ rybenaRepositoryUrl
														+ "resource/img/loading.gif'></img>";
												window.document
														.getElementById(
																"rybenaVozDiv")
														.appendChild(loadingDiv);

												load();
												initialize();
												showTTS();
											});

						} else {
							showTTS();
						}
					});

}

function detectPlugin() {
	var name = "java";
	for ( var i = 0; navigator.plugins[i]; ++i) {
		if (navigator.plugins[i].name.toLowerCase().indexOf(name) > -1)
			alert(navigator.plugins[i].name.toLowerCase());
		return true;
	}
	return false;
}

function includeRybena() {

	document
			.write("<div id=\"headerRybena\">"
					+ "<div class=\"rybena\">"
					+ "<img width=\"135px\" height=\"37px\" usemap=\"#rybenamapTopo\" alt=\"Rybena;\" src=\"http://www.grupoicts.com.br/barraRybena.png\" border=\"0\">"
					+ "<map id=\"rybenamapTopo\" name=\"rybenamapTopo\">"
					+ "<area style=\"cursor: pointer\" class=\"areaRybenaLibras\" title=\"Clique aqui para traduzir para LIBRAS o texto selecionado.\" alt=\"Clique aqui para traduzir para LIBRAS o texto selecionado.\" coords=\"70,0,99,29\" shape=\"rect\">"
					+ "<area style=\"cursor: pointer; background-color: Green;\" class=\"areaRybenaTTS\" title=\"Clique aqui para ouvir o texto selecionado.\" alt=\"Clique aqui para ouvir o texto selecionado.\" coords=\"105,1,138,32\" shape=\"rect\">"
					+ "</map>"
					+ "<div id=\"rybenaDiv\" style=\"background-image: url('"
					+ rybenaRepositoryUrl
					+ "resource/img/borda_libras.png'); height: 358px; width: 211px; position: fixed; top: 60px; left: 570px; align: center; visibility: hidden; z-index: 9999;\">"
					+ "<div onclick=\"fecharLibras();\" title=\"Fechar\" style=\"height: 24px; width: 22px; position: relative; top: 3px; left: 182px;\"></div>"
					+ "<div style=\"position: absolute; top: 37px; left: 9px; margin-left: auto; margin-right: auto;\">"
					+ "<img id=\"rybenaImage\" alt=\"Rybená\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/rybeninha_idle.gif\" width=\"194\" border=\"0\">"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 297px; width: 211px; text-align: center;\">"
					+ "<label id=\"rybenaLabel\" style=\"font-family: arial, helvetica; font-size: 12px; font-weight: bold; text-align: center;\">Rybená</label>"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 320px; left: 58px;\">"
					+ "<img id=\"playBtn\" onclick=\"repeatRybena();\" alt=\"play\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/play.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/playSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/play.png'\" border=\"0\" title=\"Traduzir\" onclick=\"setPlayRybena();\"> <img id=\"pauseBtn\" onclick=\"pauseRybena();\" alt=\"pause\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/pause.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/pauseSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/pause.png'\" border=\"0\" style=\"visibility: hidden; position: absolute; left: -1px; top: -1px; \" title=\"Pausar Tradução\"> <img id=\"stopBtn\" onclick=\"stopRybena();\" alt=\"stop\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stopSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png'\" border=\"0\" title=\"Parar Tradução\"> <!--<img id=\"repeatBtn\" onclick=\"repeatRybena();\" alt=\"repeat\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeatSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png'\" border=\"0\" title=\"Repetir texto já traduzido\">--> <img id=\"speedUpBtn\" onclick=\"speedUpRybena();\" alt=\"speedUp\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/speedUp.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedUpSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedUp.png'\" border=\"0\" title=\"Aumentar velocidade de tradução\"> <img id=\"speedDownBtn\" onclick=\"speedDownRybena();\" alt=\"speedDown\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/speedDown.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedDownSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedDown.png'\" border=\"0\" title=\"Diminuir velocidade de tradução\">"
					+ "</div>"
					+ "</div>"
					+ "<div id=\"rybenaVozDiv\" style=\"background-image: url('"
					+ rybenaRepositoryUrl
					+ "resource/img/borda_libras.png'); height: 358px; width: 211px; position: fixed; top: 60px; left: 570px; align: center; visibility: hidden; z-index: 9999;\">"
					+ "<div onclick=\"fecharTTS();\" title=\"Fechar\" style=\"height: 24px; width: 22px; position: relative; top: 3px; left: 182px;\"></div>"
					+ "<div style=\"position: absolute; top: 37px; left: 9px; margin-left: auto; margin-right: auto;\">"
					+ "<img id=\"rybenaVozImage\" alt=\"RybenáVoz\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/rybeninha_voz_idle.gif\" width=\"194\" border=\"0\">"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 297px; width: 211px; text-align: center;\">"
					+ "<label id=\"rybenaVozLabel\" style=\"font-family: arial, helvetica; font-size: 12px; font-weight: bold; text-align: center;\"></label>"
					+ "</div>"
					+ "<div style=\"position: absolute; left: 5px; top: 28px; width: 200px; height: 38px; text-align: center;\">"
					+ "<audio onloadstart=\"onloadTTS();\" oncanplay=\"onplayTTS();\" onended=\"pauseTTS();\" onerror=\"pauseTTS();\" id=\"tts\" hidden=\"hidden\">"
					+ "<source src=\"\" type=\"\">"
					+ "Your Browser do not support Html5+ Audio."
					+ "</audio>"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 320px; left: 80px;\">"
					+ "<img id=\"playBtnVoz\" onclick=\"playTTS();\" alt=\"play\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/play.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/playSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/play.png'\" border=\"0\" title=\"Traduzir\" ondblclick=\"playTTS();\"> <img id=\"stopBtn\" onclick=\"pauseTTS();\" alt=\"stop\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stopSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png'\" border=\"0\" title=\"Parar Tradução\"> <!--<img id=\"restartTTS();\" onclick=\"repeatSound();\" alt=\"repeat\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeatSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png'\" border=\"0\" title=\"Repetir texto já traduzido\">-->"
					+ "</div>" + "</div>" + "</div>" + "</div>");
}


function includeRybenaNoBar() {

	document
			.write("<div id=\"headerRybena\">"
					+ "<div class=\"rybena\">"
					+ "<div id=\"rybenaDiv\" style=\"background-image: url('"
					+ rybenaRepositoryUrl
					+ "resource/img/borda_libras.png'); height: 358px; width: 211px; position: fixed; top: 60px; left: 570px; align: center; visibility: hidden; z-index: 9999;\">"
					+ "<div onclick=\"fecharLibras();\" title=\"Fechar\" style=\"height: 24px; width: 22px; position: relative; top: 3px; left: 182px;\"></div>"
					+ "<div style=\"position: absolute; top: 37px; left: 9px; margin-left: auto; margin-right: auto;\">"
					+ "<img id=\"rybenaImage\" alt=\"Rybená\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/rybeninha_idle.gif\" width=\"194\" border=\"0\">"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 297px; width: 211px; text-align: center;\">"
					+ "<label id=\"rybenaLabel\" style=\"font-family: arial, helvetica; font-size: 12px; font-weight: bold; text-align: center;\">Rybená</label>"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 320px; left: 58px;\">"
					+ "<img id=\"playBtn\" onclick=\"repeatRybena();\" alt=\"play\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/play.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/playSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/play.png'\" border=\"0\" title=\"Traduzir\" onclick=\"setPlayRybena();\"> <img id=\"pauseBtn\" onclick=\"pauseRybena();\" alt=\"pause\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/pause.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/pauseSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/pause.png'\" border=\"0\" style=\"visibility: hidden; position: absolute; left: -1px; top: -1px; \" title=\"Pausar Tradução\"> <img id=\"stopBtn\" onclick=\"stopRybena();\" alt=\"stop\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stopSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png'\" border=\"0\" title=\"Parar Tradução\"> <!--<img id=\"repeatBtn\" onclick=\"repeatRybena();\" alt=\"repeat\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeatSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png'\" border=\"0\" title=\"Repetir texto já traduzido\">--> <img id=\"speedUpBtn\" onclick=\"speedUpRybena();\" alt=\"speedUp\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/speedUp.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedUpSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedUp.png'\" border=\"0\" title=\"Aumentar velocidade de tradução\"> <img id=\"speedDownBtn\" onclick=\"speedDownRybena();\" alt=\"speedDown\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/speedDown.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedDownSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/speedDown.png'\" border=\"0\" title=\"Diminuir velocidade de tradução\">"
					+ "</div>"
					+ "</div>"
					+ "<div id=\"rybenaVozDiv\" style=\"background-image: url('"
					+ rybenaRepositoryUrl
					+ "resource/img/borda_libras.png'); height: 358px; width: 211px; position: fixed; top: 60px; left: 570px; align: center; visibility: hidden; z-index: 9999;\">"
					+ "<div onclick=\"fecharTTS();\" title=\"Fechar\" style=\"height: 24px; width: 22px; position: relative; top: 3px; left: 182px;\"></div>"
					+ "<div style=\"position: absolute; top: 37px; left: 9px; margin-left: auto; margin-right: auto;\">"
					+ "<img id=\"rybenaVozImage\" alt=\"RybenáVoz\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/rybeninha_voz_idle.gif\" width=\"194\" border=\"0\">"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 297px; width: 211px; text-align: center;\">"
					+ "<label id=\"rybenaVozLabel\" style=\"font-family: arial, helvetica; font-size: 12px; font-weight: bold; text-align: center;\"></label>"
					+ "</div>"
					+ "<div style=\"position: absolute; left: 5px; top: 28px; width: 200px; height: 38px; text-align: center;\">"
					+ "<audio onloadstart=\"onloadTTS();\" oncanplay=\"onplayTTS();\" onended=\"pauseTTS();\" onerror=\"pauseTTS();\" id=\"tts\" hidden=\"hidden\">"
					+ "<source src=\"\" type=\"\">"
					+ "Your Browser do not support Html5+ Audio."
					+ "</audio>"
					+ "</div>"
					+ "<div style=\"position: absolute; top: 320px; left: 80px;\">"
					+ "<img id=\"playBtnVoz\" onclick=\"playTTS();\" alt=\"play\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/play.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/playSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/play.png'\" border=\"0\" title=\"Traduzir\" ondblclick=\"playTTS();\"> <img id=\"stopBtn\" onclick=\"pauseTTS();\" alt=\"stop\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stopSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/stop.png'\" border=\"0\" title=\"Parar Tradução\"> <!--<img id=\"restartTTS();\" onclick=\"repeatSound();\" alt=\"repeat\" src=\""
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png\" onmouseover=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeatSub.png'\" onmouseout=\"this.src='"
					+ rybenaRepositoryUrl
					+ "resource/img/repeat.png'\" border=\"0\" title=\"Repetir texto já traduzido\">-->"
					+ "</div>" + "</div>" + "</div>" + "</div>");
}