"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/vendor"],{

/***/ "./node_modules/@paypal/paypal-js/dist/esm/paypal-js.js":
/*!**************************************************************!*\
  !*** ./node_modules/@paypal/paypal-js/dist/esm/paypal-js.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "loadCustomScript": () => (/* binding */ loadCustomScript),
/* harmony export */   "loadScript": () => (/* binding */ loadScript),
/* harmony export */   "version": () => (/* binding */ version)
/* harmony export */ });
/*!
 * paypal-js v5.0.5 (2022-04-21T21:11:36.416Z)
 * Copyright 2020-present, PayPal, Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function findScript(url, attributes) {
    var currentScript = document.querySelector("script[src=\"".concat(url, "\"]"));
    if (currentScript === null)
        return null;
    var nextScript = createScriptElement(url, attributes);
    // ignore the data-uid-auto attribute that gets auto-assigned to every script tag
    var currentScriptClone = currentScript.cloneNode();
    delete currentScriptClone.dataset.uidAuto;
    // check if the new script has the same number of data attributes
    if (Object.keys(currentScriptClone.dataset).length !==
        Object.keys(nextScript.dataset).length) {
        return null;
    }
    var isExactMatch = true;
    // check if the data attribute values are the same
    Object.keys(currentScriptClone.dataset).forEach(function (key) {
        if (currentScriptClone.dataset[key] !== nextScript.dataset[key]) {
            isExactMatch = false;
        }
    });
    return isExactMatch ? currentScript : null;
}
function insertScriptElement(_a) {
    var url = _a.url, attributes = _a.attributes, onSuccess = _a.onSuccess, onError = _a.onError;
    var newScript = createScriptElement(url, attributes);
    newScript.onerror = onError;
    newScript.onload = onSuccess;
    document.head.insertBefore(newScript, document.head.firstElementChild);
}
function processOptions(options) {
    var sdkBaseURL = "https://www.paypal.com/sdk/js";
    if (options.sdkBaseURL) {
        sdkBaseURL = options.sdkBaseURL;
        delete options.sdkBaseURL;
    }
    processMerchantID(options);
    var _a = Object.keys(options)
        .filter(function (key) {
        return (typeof options[key] !== "undefined" &&
            options[key] !== null &&
            options[key] !== "");
    })
        .reduce(function (accumulator, key) {
        var value = options[key].toString();
        if (key.substring(0, 5) === "data-") {
            accumulator.dataAttributes[key] = value;
        }
        else {
            accumulator.queryParams[key] = value;
        }
        return accumulator;
    }, {
        queryParams: {},
        dataAttributes: {},
    }), queryParams = _a.queryParams, dataAttributes = _a.dataAttributes;
    return {
        url: "".concat(sdkBaseURL, "?").concat(objectToQueryString(queryParams)),
        dataAttributes: dataAttributes,
    };
}
function objectToQueryString(params) {
    var queryString = "";
    Object.keys(params).forEach(function (key) {
        if (queryString.length !== 0)
            queryString += "&";
        queryString += key + "=" + params[key];
    });
    return queryString;
}
/**
 * Parse the error message code received from the server during the script load.
 * This function search for the occurrence of this specific string "/* Original Error:".
 *
 * @param message the received error response from the server
 * @returns the content of the message if the string string was found.
 *          The whole message otherwise
 */
function parseErrorMessage(message) {
    var originalErrorText = message.split("/* Original Error:")[1];
    return originalErrorText
        ? originalErrorText.replace(/\n/g, "").replace("*/", "").trim()
        : message;
}
function createScriptElement(url, attributes) {
    if (attributes === void 0) { attributes = {}; }
    var newScript = document.createElement("script");
    newScript.src = url;
    Object.keys(attributes).forEach(function (key) {
        newScript.setAttribute(key, attributes[key]);
        if (key === "data-csp-nonce") {
            newScript.setAttribute("nonce", attributes["data-csp-nonce"]);
        }
    });
    return newScript;
}
function processMerchantID(options) {
    var merchantID = options["merchant-id"], dataMerchantID = options["data-merchant-id"];
    var newMerchantID = "";
    var newDataMerchantID = "";
    if (Array.isArray(merchantID)) {
        if (merchantID.length > 1) {
            newMerchantID = "*";
            newDataMerchantID = merchantID.toString();
        }
        else {
            newMerchantID = merchantID.toString();
        }
    }
    else if (typeof merchantID === "string" && merchantID.length > 0) {
        newMerchantID = merchantID;
    }
    else if (typeof dataMerchantID === "string" &&
        dataMerchantID.length > 0) {
        newMerchantID = "*";
        newDataMerchantID = dataMerchantID;
    }
    options["merchant-id"] = newMerchantID;
    options["data-merchant-id"] = newDataMerchantID;
    return options;
}

/**
 * Load the Paypal JS SDK script asynchronously.
 *
 * @param {Object} options - used to configure query parameters and data attributes for the JS SDK.
 * @param {PromiseConstructor} [PromisePonyfill=window.Promise] - optional Promise Constructor ponyfill.
 * @return {Promise<Object>} paypalObject - reference to the global window PayPal object.
 */
function loadScript(options, PromisePonyfill) {
    if (PromisePonyfill === void 0) { PromisePonyfill = getDefaultPromiseImplementation(); }
    validateArguments(options, PromisePonyfill);
    // resolve with null when running in Node
    if (typeof window === "undefined")
        return PromisePonyfill.resolve(null);
    var _a = processOptions(options), url = _a.url, dataAttributes = _a.dataAttributes;
    var namespace = dataAttributes["data-namespace"] || "paypal";
    var existingWindowNamespace = getPayPalWindowNamespace(namespace);
    // resolve with the existing global paypal namespace when a script with the same params already exists
    if (findScript(url, dataAttributes) && existingWindowNamespace) {
        return PromisePonyfill.resolve(existingWindowNamespace);
    }
    return loadCustomScript({
        url: url,
        attributes: dataAttributes,
    }, PromisePonyfill).then(function () {
        var newWindowNamespace = getPayPalWindowNamespace(namespace);
        if (newWindowNamespace) {
            return newWindowNamespace;
        }
        throw new Error("The window.".concat(namespace, " global variable is not available."));
    });
}
/**
 * Load a custom script asynchronously.
 *
 * @param {Object} options - used to set the script url and attributes.
 * @param {PromiseConstructor} [PromisePonyfill=window.Promise] - optional Promise Constructor ponyfill.
 * @return {Promise<void>} returns a promise to indicate if the script was successfully loaded.
 */
function loadCustomScript(options, PromisePonyfill) {
    if (PromisePonyfill === void 0) { PromisePonyfill = getDefaultPromiseImplementation(); }
    validateArguments(options, PromisePonyfill);
    var url = options.url, attributes = options.attributes;
    if (typeof url !== "string" || url.length === 0) {
        throw new Error("Invalid url.");
    }
    if (typeof attributes !== "undefined" && typeof attributes !== "object") {
        throw new Error("Expected attributes to be an object.");
    }
    return new PromisePonyfill(function (resolve, reject) {
        // resolve with undefined when running in Node
        if (typeof window === "undefined")
            return resolve();
        insertScriptElement({
            url: url,
            attributes: attributes,
            onSuccess: function () { return resolve(); },
            onError: function () {
                var defaultError = new Error("The script \"".concat(url, "\" failed to load."));
                if (!window.fetch) {
                    return reject(defaultError);
                }
                // Fetch the error reason from the response body for validation errors
                return fetch(url)
                    .then(function (response) {
                    if (response.status === 200) {
                        reject(defaultError);
                    }
                    return response.text();
                })
                    .then(function (message) {
                    var parseMessage = parseErrorMessage(message);
                    reject(new Error(parseMessage));
                })
                    .catch(function (err) {
                    reject(err);
                });
            },
        });
    });
}
function getDefaultPromiseImplementation() {
    if (typeof Promise === "undefined") {
        throw new Error("Promise is undefined. To resolve the issue, use a Promise polyfill.");
    }
    return Promise;
}
function getPayPalWindowNamespace(namespace) {
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    return window[namespace];
}
function validateArguments(options, PromisePonyfill) {
    if (typeof options !== "object" || options === null) {
        throw new Error("Expected an options object.");
    }
    if (typeof PromisePonyfill !== "undefined" &&
        typeof PromisePonyfill !== "function") {
        throw new Error("Expected PromisePonyfill to be a function.");
    }
}

// replaced with the package.json version at build time
var version = "5.0.5";




/***/ })

}]);