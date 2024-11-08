function popup(type, message) {
    const popup = document.createElement("div");
    popup.className =
        "fixed flex flex-col items-center justify-center w-1/3 h-auto transform -translate-x-1/2 bg-black bottom-4 left-1/2 -translate-y-0";
    popup.innerHTML = /*html*/ `
        <div class="text-left ${
            type === "error" ? "text-highlight" : "text-secondary"
        } w-full p-2">
            > ${type}
        </div>
        <div class="text-left text-secondary w-full p-2">
            ${message}
        </div>
    `;
    document.body.appendChild(popup);

    setTimeout(() => {
        popup.remove();
    }, 3000);
}

export { popup };
