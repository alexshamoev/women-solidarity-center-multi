import React, { Component } from "react";

export default class SearchAnswer extends Component {
    constructor(props) {
        super(props);

        this.state = {
            lang: $(".js_lang").val(),
        };
    }

    render() {
        return (
            <div className="p-2 border header__searchAnswers">
                <a href={this.props.answer.fullUrl}>
                    <div className="">
                        <div className="p-2">
                            <h4>{this.props.answer.title}</h4>
                        </div>

                        <div className="p-2">
                            <div className="line_max_1">
                                {this.props.answer.text.replace(
                                    /(<([^>]+)>)/gi,
                                    ""
                                )}{" "}
                                {/* Removing html tags from answer text */}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        );
    }
}
