import {View, Text, StyleSheet, Image, FlatList} from 'react-native';

export default function Card({nome, valor, imagem}){
    return (
        <View style={styles.card}>
            <Image source={{uri: imagem,}} style={styles.image}/>
            <Text style={styles.model}>{nome}</Text>
            <Text style={styles.price}>Preço: ${valor.toFixed(2)}</Text>
        </View>
    )
}
const styles =  StyleSheet.create({
    card: {
        backgroundColor: '#fff',
        borderRadius: 8,
        padding: 15,
        marginBottom: 15,
        alignItems: 'center',
    },
    image: {
        width: 300,
        height: 180,
        borderRadius: 8,
        marginBottom: 10,
    },
    model: {
        fontSize: 18,
        fontWeight: '600',
        color: '#555',
    },
    price: {
        fontSize: 16,
        color: '#888',
        marginTop: 5,
    }
})