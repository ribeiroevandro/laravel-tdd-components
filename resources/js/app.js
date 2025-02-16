import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

window.handleModal = (event, params = {}) => {
    const eventName =
        typeof event === "string" ? event : event?.target?.dataset?.modal;
    if (!eventName) return;

    window.dispatchEvent(
        new CustomEvent(eventName, {
            detail: params,
            bubbles: true,
        })
    );
};

Alpine.start();
