import React, { Component } from "react";
import axios from "axios";
import SearchAnswer from "./SearchAnswer";

export default class SearchField extends Component {
    constructor(props) {
        super(props);

        this.state = {
            lang: $(".js_lang").val(),
            value: "",
            loading: false,
            searchAnswers: [],
            showEmptyMessage: false,
            translationStrings: [],
            timeout: false,
            keyUpDelay: 300,
        };

        this.handleChange = this.handleChange.bind(this);

        let self = this;

        axios
            .post("/get-translation-strings", {
                lang: this.state.lang,
            })
            .then(function (response) {
                self.setState({ translationStrings: response.data });
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    handleChange(event) {
        let newValue = event.target.value;
        let self = this;

        if (self.state.timeout) {
            clearTimeout(this.state.timeout);
        }

        /* console.log('test', self.state.timeout); */

        self.state.timeout = setTimeout(function () {
            self.setState({ value: newValue });

            if (newValue) {
                axios
                    .post("/get-react-search", {
                        q: newValue,
                        lang: self.state.lang,
                    })
                    .then(function (response) {
                        self.setState({ searchAnswers: response.data });

                        if (response.data.length === 0) {
                            self.setState({ showEmptyMessage: true });
                        } else {
                            self.setState({ showEmptyMessage: false });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                // console.log('remove empty block');

                self.setState({ searchAnswers: [] });
                self.setState({ showEmptyMessage: false });
            }
        }, self.state.keyUpDelay);
    }

    render() {
        let emptyMessageWithBlock = "";

        if (this.state.showEmptyMessage) {
            emptyMessageWithBlock = (
                <div className="p-3">
                    {this.state.translationStrings.no_search_answers}
                </div>
            );
        }

        return (
            <div>
                <div className="">
                    <div className=" p-2">
                        <input
                            type="text"
                            id="search"
                            placeholder={this.state.translationStrings.search}
                            className="ps-5 
                                        w-100 
                                        header__search_inp 
                                        h-100 
                                        w-100
                                        p-0
                                        top-0 
                                        start-0 
                                        border
                                        ps-5
                                        position-absolute"
                            onChange={this.handleChange}
                        />
                    </div>

                    <div
                        className="header__search_answer
                                    w-100
                                    position-absolute
                                    bg-white
                                    start-0
                                    "
                    >
                        {this.state.searchAnswers.map((answer, index) => (
                            <SearchAnswer key={index} answer={answer} />
                        ))}

                        {emptyMessageWithBlock}
                    </div>
                </div>
            </div>
        );
    }
}
