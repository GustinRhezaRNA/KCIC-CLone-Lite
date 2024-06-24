document.addEventListener('DOMContentLoaded', () => {
    let selectKursi = document.querySelector("select[name='kursi']");
    let selectedKursi = document.getElementById('selected-kursi');

    let updateSelectedKursi = () => {
        let selected = selectKursi.options[selectKursi.selectedIndex].text;
        console.log(selected);
        selectedKursi.textContent = selected;
    };

    selectKursi.addEventListener('change', updateSelectedKursi);
});