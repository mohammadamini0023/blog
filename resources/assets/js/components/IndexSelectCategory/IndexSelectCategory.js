import React, { Component } from 'react';
import Axios from 'axios';
import {HashRouter} from 'react-router-dom';
import Header from './../Index/Header'
import Body from './Body'


export default class IndexSelectCategory extends React.Component {
  constructor (props){
    super(props)
    this.props=props;
    this.state={category_id:this.props.location.state.Category_Id ,
                categoryname:this.props.location.state.CategoryName};
  }


  componentWillReceiveProps(newProps) {
      this.setState({category_id: newProps.location.state.Category_Id,
                    categoryname: newProps.location.state.CategoryName});
   }

  render() {
    return (
      <div>
        <Header />
        <Body category_id={this.state.category_id} categoryname={this.state.categoryname} rebackpage={this.props.history} />
      </div>
    );
  }
}
