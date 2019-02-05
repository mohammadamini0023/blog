//import component react & npm
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import Axios from 'axios'
import {BrowserRouter as Router , Link , Route} from 'react-router-dom'
import DivisionApi from './App/helper.js';



//imnport material
import {Cell, Grid, Row} from '@material/react-layout-grid'
import List, {ListItem, ListItemText} from '@material/react-list';
import Card, {CardPrimaryContent,CardMedia,CardActions,CardActionButtons,CardActionIcons} from '@material/react-card'

//import component me






class Header extends React.Component {
  constructor (props){
    super(props)
  }
  render(){
    return(
      <div>
          <Row  className="header-group" >
            <Cell columns={1}>Home</Cell>
            <Cell columns={1}>Mozayedeh</Cell>
            <Cell columns={1}>Aboute Me</Cell>
            <Cell columns={1}>Protocol</Cell>
            <Cell columns={1}>tell me</Cell>
            <Cell columns={7}>sumbit</Cell>
          </Row>
      </div>
    );
  }
}

class Body extends React.Component{
  constructor (props){
    super(props)
    this.state = {categorys:[],products:[]};
    this.ButtonClick=this.ButtonClick.bind(this);
  }


  componentDidMount(){

    //get categorys
    Axios.get('api/category').then((response) => {
      this.setState({
        categorys : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });

    //get Products
    Axios.get('api/AllProduct').then((response) => {
      this.setState({
        products : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });
  }


  ButtonClick(e,category){
    if(category.children.length == 0){
      this.setState({category_id:category.category_id});
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
  render() {
    return (
        <Row  className="menu-right-group" >
          <Cell columns={2}><MenuRight categorys={this.state.categorys} ButtonClick={this.ButtonClick}/></Cell>
          <Cell columns={10}><Products products={this.state.products} /></Cell>
        </Row>
    );
  }


}

class MenuRight extends React.Component {
  constructor (props){
    super(props)
    this.state = {categorys:[]};
  }

  renderRow(){
    return this.props.categorys.map((category) => {
      return(<ListItem key={category.category_id}  onClick={(e) => this.props.ButtonClick(e,category)}>
        <ListItemText   primaryText={category.category}  />
          </ListItem>
        );
    });
  }



  render(){
    return(
      <div>
        <List className="menu-right-group">
            {this.renderRow()}
        </List>
      </div>
    );
  }
}

class Products extends React.Component{
  constructor (props){
    super(props)
  }

  renderProducts(){
    return this.props.products.map((product) => {
      return(
        <Cell key={product.product_id} columns={3}  >
          <Card>
                <h5>{product.title_product}</h5>

                
          </Card>
        </Cell>
        );
    });
  }

  render(){
    return(
      <Row>
        {this.renderProducts()}
      </Row>
    );
  }
}



export default class Exam extends React.Component {
  constructor (props){
    super(props)
    this.state = {categorys:[]};

  }



  render() {
    return (
    //<Router>
      <div>
        <Grid>
          <Header />
          <Body  />
        </Grid>

      </div>
    // </Router>
    );
  }
}
ReactDOM.render(<Exam />, document.getElementById('root'));
