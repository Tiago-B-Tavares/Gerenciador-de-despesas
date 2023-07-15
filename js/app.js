function passaModalAlterar(id, descricao, valor, data) {

	document.getElementById("idEdicao").value = id;
	document.getElementById("descricaoEdicao").value = descricao;
	document.getElementById("valorEdicao").value = valor;
	document.getElementById("dataEdicao").value = data;
	//document.getElementById("retorno").innerHTML= id;
	//alert(id);
	
}

function passaModalRemover(id, descricao) {
	document.getElementById("idRemover").value = id;
	document.getElementById("descricaoRemover").textContent = descricao;

}