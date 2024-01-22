function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section.style.maxHeight !== "0px") {
        section.style.maxHeight = "0px";
    } else {
        section.style.maxHeight = section.scrollHeight + "px";
    }
}
