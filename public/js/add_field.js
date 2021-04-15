const medicamentsList = document.querySelector('.medicaments_list');
const medicamentField = document.querySelector('.medicament_field');
const addField = document.querySelector('#add_field');

addField.addEventListener('click', e => {
	e.preventDefault();

	console.log('test');
	const medicamentFieldIndex = Array.from(document.querySelectorAll('.medicament_field')).length;
	const clone = medicamentField.cloneNode(true);
	clone.insertAdjacentHTML('beforeend', '<a href="#" class="remove_field">Retirer</a>');

	let cloneHTML = `<div class="medicament_field">${clone.innerHTML}</div>`;

	cloneHTML = cloneHTML.replace(/compte_rendu_presentation_(\d+)_medicament/gim, `compte_rendu_presentation_${medicamentFieldIndex}_medicament`);

	cloneHTML = cloneHTML.replace(/compte_rendu\[presentation\]\[(\d+)\]\[medicament\]/gim, `compte_rendu[presentation][${medicamentFieldIndex}][medicament]`);

	cloneHTML = cloneHTML.replace(/compte_rendu_presentation_(\d+)_quantite_offerte/gim, `compte_rendu_presentation_${medicamentFieldIndex}_quantite_offerte`);

	cloneHTML = cloneHTML.replace(/compte_rendu\[presentation\]\[0\]\[quantite_offerte\]/gim, `compte_rendu[presentation][${medicamentFieldIndex}][quantite_offerte]`);

	medicamentsList.insertAdjacentHTML('beforeend', cloneHTML);

	const retirerField = document.querySelector('.medicament_field:last-child .remove_field');
	retirerField.addEventListener('click', e => {
		e.preventDefault();
		medicamentsList.removeChild(e.target.parentNode);
	});
});