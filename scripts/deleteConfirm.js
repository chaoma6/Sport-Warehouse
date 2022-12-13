const deleteLinks = document.querySelectorAll(".delete");
for (let i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener("click", confirmDelete);
}
function confirmDelete(event) {
    if (!confirm("Do you want to delete")) {
        event.preventDefault();
        return false;
    }
}
