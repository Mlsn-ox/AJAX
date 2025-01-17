const btnLike = document.querySelectorAll(".btnLike");
const nbrLike = document.querySelectorAll(".nbrLike");
const btnList = document.querySelectorAll(".btnList");

btnLike.forEach((btnIndiv) => {
  btnIndiv.addEventListener("click", function () {
    fetch("update_like.php", getData(btnIndiv))
      .then((response) => response.json())
      .then((res) => {
        nbrLike.forEach((nl) => {
          if (nl.dataset.id == res.id) {
            nl.innerHTML = res.like;
          }
        });
      });
  });
});

btnList.forEach((btn) => {
  btn.addEventListener("click", function () {
    fetch("update_list.php", getData(btn))
      .then((response) => response.json())
      .then((res) => {
        btn.innerHTML = res.valid
          ? "Retirer de la liste"
          : "Afficher sur la liste";
      });
  });
});

function getData(el) {
  let id = el.dataset.id;
  const formData = new FormData();
  formData.append("id", id);
  const data = {
    method: "POST",
    body: formData,
  };
  return data;
}
