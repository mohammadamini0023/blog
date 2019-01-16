//import component react & npm
import React, { Component } from 'react';
import Axios from 'axios';
import {BrowserRouter as Router , Link , Route} from 'react-router-dom'

//import component me
import Body from './Body';

class MenuRight extends Component {
  constructor (props){
    super(props)
    this.state = {categorys: props.categorys};
    this.renderRow=this.renderRow.bind(this);
    this.ButtonClick=this.ButtonClick.bind(this);
  }


  componentWillMount(){
    this.state = {categorys: this.props.categorys};
    console.log(this.state.categorys);
  }


  allcategory(){
    Axios.get('api/category').then((response) => {
      this.setState({
        categorys : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });
  }



    renderRow(){
      return this.state.categorys.map((category) => {
        return(<a href="#" key={category.category_id} onClick={(e) => this.ButtonClick(e,category,{ match })}
        className="list-group-item list-group-item-action list-group-item-light">{category.category}</a>);
      });
    }




    ButtonClick(e,category){
      e.preventDefault();
      if(category.children.length == 0){
        this.setState({category_id:category.category_id});
        <Body title="salam" />
        console.log(category.category_id);
        }

      else if (true) {
         let cat=category.category_id;
        Axios.get('api/category/get',{params: {category_id: cat}}).then((response) => {
          this.setState({
            categorys : response.data,
          });
        }).catch( (error) => {
          console.log(error);
        });
      }
  }


    render(){

      return (
        <Router>
        <div>
        <div className="list-group list-group-category" id="list-tab" role="tablist">
          <a href="#" className="list-group-item list-group-item-action list-group-item-light">دسته بندی ها</a>
          {this.renderRow()}
        </div>
        </div>
        </Router>
      );
    }
}
export default MenuRight;
