import React, { Component } from "react";
import ReactDOM from "react-dom";

import SearchField from "./SearchField";

export default class ReactApp extends Component {
    render() {
        return (
            <div>
                <SearchField />
            </div>
        );
    }
}

$(function () {
    // console.log(0);

    if (document.getElementById("examplereact")) {
        // console.log(1);

        ReactDOM.render(<ReactApp />, document.getElementById("examplereact"));
    }

    if (document.getElementById("react_search")) {
        // console.log(2);

        ReactDOM.render(<ReactApp />, document.getElementById("react_search"));
    }
});
