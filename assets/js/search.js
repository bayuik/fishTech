let searchFish = _ => {
    let searchFishName = document.getElementById('searchFishTitle');
    let filter = searchFishName.value.toUpperCase();
    let fish = document.getElementsByClassName("card");

    for (let i = 0; i < fish.length; i++) {
        let fishTitle = fish[i].getElementsByTagName("h5")[0];
        let textValue = fishTitle.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            fish[i].style.display = "";
        } else {
            fish[i].style.display = "none";
        }
    }
}


let searchData = _ => {
    let searchFishName = document.getElementById('searchData');
    let filter = searchFishName.value.toUpperCase();
    let fish = document.getElementsByClassName("dataIkan");

    for (let i = 0; i < fish.length; i++) {
        let fishTitle = fish[i].getElementsByTagName("td")[0];
        let textValue = fishTitle.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            fish[i].style.display = "";
        } else {
            fish[i].style.display = "none";
        }
    }
}