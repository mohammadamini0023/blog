//import component react & npm
import React, { Component } from 'react';

//imnport material


//import component me
import Header from '../Index/Header'


class ShowSingleProduct extends React.Component {
  constructor (props){
    super(props)
    this.state={product:[this.props.location.state.DetailsProduct]}
  }
  render() {
    return(
      <div>

          <Header />

        
      </div>
    );
  }
}
export default ShowSingleProduct;
