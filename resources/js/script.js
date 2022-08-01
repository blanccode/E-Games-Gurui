import { loadScript } from "@paypal/paypal-js";

loadScript({ "client-id": "EPAJhzkROmLmeYW2cmS6kN8ofSC2utNcPDx63V4sLjHVCGUDsCY6dYeUdY9k6xE1y443O1y2ZxmdQuxs" })
    .then((paypal) => {
        paypal
            .Buttons()
            .render("#your-container-element")
            .catch((error) => {
                console.error("failed to render the PayPal Buttons", error);
            });
    })
    .catch((error) => {
        console.error("failed to load the PayPal JS SDK script", error);
    });

// loadScript({ "client-id": "EPAJhzkROmLmeYW2cmS6kN8ofSC2utNcPDx63V4sLjHVCGUDsCY6dYeUdY9k6xE1y443O1y2ZxmdQuxs", currency: "EUR" });



