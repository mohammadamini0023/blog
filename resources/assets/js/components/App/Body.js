//import component react & npm
import React, { Component } from 'react';

//import component me


class Body extends Component {
    constructor (props){
      super(props)
    }
    render(){
      return (
        <div className="row">
          <h1>{this.props.title}</h1>
        </div>
      );
    }
}
export default Body;
