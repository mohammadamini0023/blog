//import component react & npm
import React, { Component } from 'react';
import Axios from 'axios';



//imnport material
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';


//import component me;
import MenuRight from './MenuRight'
import Products from './Products'


class Body extends React.Component{
  constructor (props){
    super(props)
    this.state = {categorys:[],products:[] , url:'http://localhost:8080/api/ProCategoryIndex' , paginate:[]};
    this.loadMore=this.loadMore.bind(this);
  }

  //daryaft etelaat api az noe safhe bandi
  makePaginate(product){
    let paginate={
      current_page:product.current_page,
      last_page : product.last_page,
      last_page_url : product.last_page_url,
      next_page_url : product.next_page_url
    }
    this.setState({paginate : paginate});
  }

  fetchProduct(){
    //get categoryss
    Axios.get('http://localhost:8080/api/Category').then((response) => {
      this.setState({
        categorys : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });

    //get Products
    Axios.get(this.state.url).then((response) => {
      this.setState({
        products : this.state.products.length>0? this.state.products.concat(response.data.data): response.data.data,
        url : response.data.next_page_url
      });
      this.makePaginate(response.data);
    }).catch( (error) => {
      console.log(error);
    });
  }
  loadMore(){
    this.setState({url : this.state.paginate.next_page_url},()=>{this.fetchProduct()});
  }

  componentWillMount(){
    this.fetchProduct();
  }


  render() {
    return (
      <div>
        <Row>
          <Col xl={2} className="col-centered col-menuright">
            <MenuRight Categorys={this.state.categorys}/>
          </Col>
          <Col xl={8} className="col-centered col-product">
            <Products  products={this.state.products} />
            <Button centerRipple onClick={this.loadMore} variant="contained" color="primary">Load More Result</Button>
          </Col>
        </Row>
      </div>
    );
  }
}
export default Body;
