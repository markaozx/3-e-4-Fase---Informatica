import {View, Text, StyleSheet, Image, FlatList} from 'react-native';
import { useState } from 'react';
import Card from './Card';

export default function Produtos(){

    const [produtos, setProdutos] = useState([
    {id: 1, nome: 'LB-WORKS Ferrari F8 Tributo', preco: 50050, foto: 'https://libertywalk.co.jp/wp-content/uploads/2024/06/LB-WORKS-F8-Tributo00004-1.jpg'},
        {id: 2, nome: 'LB-WORKS TOYOTA SUPRA (A90)', preco: 19300, foto: 'https://libertywalk.co.jp/wp-content/uploads/2025/01/SUPRA-1024x683-1.jpg'},
        {id: 3, nome: 'LB★PERFORMANCE Lamborghini AVENTADOR', preco: 31400, foto: 'https://libertywalk.co.jp/wp-content/uploads/2023/02/PERFORMANCE-Lamborghini-AVENTADOR00005-1024x683.jpg'},
        {id: 4, nome: 'LB-ER34 Super Silhouette SKYLINE', preco: 46730, foto: 'https://libertywalk.co.jp/wp-content/uploads/2022/10/ER34_silhouette-1024x683.jpg'},
        { id: 5, nome: 'LB-Super Silhouette MAZDA FD3S RX-7', preco: 24959, foto: 'https://libertywalk.co.jp/wp-content/uploads/2024/03/LBWORKS_2820_0-1024x683.jpg'},
        { id: 6, nome: 'LB★PERFORMANCE HONDA NSX (NC1)', preco: 31650, foto: 'https://libertywalk.co.jp/wp-content/uploads/2022/11/LB%E2%98%85PERFORMANCE-HONDA-NSX-NC11-1024x683.jpg'},
        { id: 7, nome: 'LB-WORKS FORD BRONCO', preco: 3080, foto: 'https://libertywalk.co.jp/wp-content/uploads/2023/08/S__29573642-1-1024x683.jpg'},
        { id: 8, nome: 'LB-WORKS Audi A5 / S5', preco: 8500, foto: 'https://libertywalk.co.jp/wp-content/uploads/2022/11/A5-1024x683.jpg'},

    ]);

    return (
        <View style={styles.container}>
            <Text style={styles.title}>Body Kits</Text>
            {/* array com metodo
            {produtos.map((item) => (
                <View>
                    <Text>Id: {item.id}</Text>
                    <Text>Modelo: {item.nome}</Text>
                    <Text>Preço: R${item.preco}</Text>
                </View>
            ))} */}
            <FlatList
            data={produtos}
            renderItem={({item}) => (
                <Card
                foto = {item.foto}
                modelo = {item.nome}
                preco = {item.preco}
                />
                // <View style={styles.card}>
                //     <Image source={{uri: item.foto}} style={styles.image}/>
                //     <Text style={styles.model}>{item.nome}</Text>
                //     <Text style={styles.price}>Preço: ${item.preco}</Text>

                // </View>
            )}
            keyExtractor={item => item.id}
            />
        </View>
        
    )
}

const styles =  StyleSheet.create({
    container:{
        flex:1,
        padding: 20,
        backgroundColor: '#f5f5f5',
    },
    title: {
        fontSize: 24,
        fontWeight: 'bold',
        marginBottom: 20,
        textAlign: 'center',
        color: '#333',
    },
    // card: {
    //     backgroundColor: '#fff',
    //     borderRadius: 8,
    //     padding: 15,
    //     marginBottom: 15,
    //     alignItems: 'center',
    // },
    // image: {
    //     width: 300,
    //     height: 180,
    //     borderRadius: 8,
    //     marginBottom: 10,
    // },
    // model: {
    //     fontSize: 18,
    //     fontWeight: '600',
    //     color: '#555',
    // },
    // price: {
    //     fontSize: 16,
    //     color: '#888',
    //     marginTop: 5,
    // }
})

